<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trxdonasi;
use App\Trxkotakinfaq;
use App\Trxibrankasku;
use App\Amil;
use App\Donatur;
use App\Trxdonasidetail;
use Carbon\Carbon;

class LaporanDonaturController extends Controller
{
    
    //bagaimana cara validasi date range nya?
    public $vrule_periodelaporan = 'required';
    public $vrule_tipelaporan = 'required|numeric';
    
    //vrule urutkan berdasarkan
    public $vrule_sortby = 'required|numeric';
    public $vrule_donatur_id = 'required_if:tipelaporan,3';
    
//===========================================================================================
//      FUNGSI TAMPIL PROSES
//===========================================================================================
    // FUNGSI tampilkan form untuk IO Laporan
    public function semuaTrx(){

        //ambil data list amil buat ditampilkan di list Optionnya
        $listdonatur = \App\Donatur::orderBy('namadonatur','asc')->get();

        return view('master/laporan/trxdonatur-form', compact('listdonatur'));
    }



//===========================================================================================
//      FUNGSI MENQUERYKAN PROSESNYA
//===========================================================================================
    //proses formnya disini untuk kemudian kita tampilkan bareng-bareng
    public function semuaTrxProses(Request $request){

        

        //cek dulu apakah data nya valid ataukah tidak. 
        $validdata = request()->validate([
            'periodelaporan' => $this->vrule_periodelaporan,
            'tipelaporan' => $this->vrule_tipelaporan,
            'donatur_id' => $this->vrule_donatur_id,
            'sortby' => $this->vrule_sortby,
        ]);

        // dd($request->all());

        //DAPATKAN VARIABELNYA =================================
        $periodelaporan = $request->periodelaporan;
        $donatur_id = $request->donatur_id;
        $tipelaporan = $request->tipelaporan;
        $sortby = $request->sortby;

        //data peruntukan donasi
        $listdonatur = \App\donatur::orderBy('namadonatur','asc')->get();
        $listdonaturaktif = \App\donatur::where('statusaktif','=',1)->orderBy('namadonatur','asc')->get();

        //MEMBUAT PERIODE LAPORAN ====================================
        //mecah dulu
        $periodearray = explode("-", $periodelaporan);
        //hapus spasi
        $periodeawal = trim($periodearray[0]);
        $periodeakhir = trim($periodearray[1]);
        //formatting
        $periodeawal = Carbon::createFromFormat('d/m/Y', $periodeawal)->toDateString();
        $periodeakhir = Carbon::createFromFormat('d/m/Y', $periodeakhir)->toDateString();


        //sekarang lakukan query berdasarkan tipe laporannya
            //dapatkan data dari kotak infaq
            $datadonasi = \App\Trxdonasi::select('id', 'donatur_id','amil_id', 'jumlahtotal', 'keterangan', 'tanggaldonasi', 'insidentil')
                                        ->with(['donatur'])
                                        ->with(['amil'])
                                        ->when(($periodelaporan!= null), function($query) use ($periodeawal, $periodeakhir){
                                            return $query->whereBetween('tanggaldonasi', [$periodeawal, $periodeakhir]);
                                        })
                                        //sortby tanggal desc
                                        ->when(($sortby== 1), function($query){
                                            return $query->orderBy('tanggaldonasi', 'desc');
                                        })
                                        //sortby tanggal asc
                                        ->when(($sortby== 2), function($query){
                                            return $query->orderBy('tanggaldonasi', 'asc');
                                        })
                                        ->get();

            $dataibrankasku = \App\Trxibrankasku::select('id', 'donatur_id', 'donatur_id', 'amil_id', 'nominalvaluasi', 'deskripsibarang', 'tanggaldonasi')
                                        ->with(['donatur'])
                                        ->with(['amil'])
                                        ->when(($periodelaporan!= null), function($query) use ($periodeawal, $periodeakhir){
                                            return $query->whereBetween('tanggaldonasi', [$periodeawal, $periodeakhir]);
                                        })
                                        //sortby tanggal desc
                                        ->when(($sortby== 1), function($query){
                                            return $query->orderBy('tanggaldonasi', 'desc');
                                        })
                                        //sortby tanggal asc
                                        ->when(($sortby== 2), function($query){
                                            return $query->orderBy('tanggaldonasi', 'asc');
                                        })
                                        ->get();


        return view('master/laporan/trxdonatur-print', compact('datadonasi','dataibrankasku','listdonatur', 'listdonaturaktif',  'periodelaporan', 'donatur_id', 'tipelaporan'));


    }

}
