<?php

namespace App\Http\Controllers;

use App\Trxdonasi;
use App\Trxkotakinfaq;
use App\Trxibrankasku;
use App\Amil;
use App\peruntukandonasi;
use App\Donatur;
use App\Trxdonasidetail;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    //validation rule
    public $vrule_istrxdonasi = 'required_without_all:istrxkotakinfaq,istrxibrankasku';
    public $vrule_istrxkotakinfaq = 'required_without_all:istrxdonasi,istrxibrankasku';
    public $vrule_istrxibrankasku = 'required_without_all:istrxdonasi,istrxkotakinfaq';
    
    //bagaimana cara validasi date range nya?
    public $vrule_periodelaporan = 'required';
    
    //vrule urutkan berdasarkan
    public $vrule_sortby = 'required';
    

//===========================================================================================
//      FUNGSI TAMPIL PROSES
//===========================================================================================
    //tampilkan form untuk IO Laporan
    public function semuaTrx(){
        return view('master/laporan/trxsemua-form');
    }


//===========================================================================================
//      FUNGSI MENQUERYKAN PROSESNYA
//===========================================================================================
    //proses formnya disini untuk kemudian kita tampilkan bareng-bareng
    public function semuaTrxProses(Request $request){

        //cek dulu apakah data nya valid ataukah tidak. 
        $validdata = request()->validate([
            'istrxdonasi' => $this->vrule_istrxdonasi,
            'istrxkotakinfaq' => $this->vrule_istrxkotakinfaq,
            'istrxibrankasku' => $this->vrule_istrxibrankasku,
            'periodelaporan' => $this->vrule_periodelaporan,
            'sortby' => $this->vrule_sortby,
        ]);

        //DAPATKAN VARIABELNYA =================================
        $istrxdonasi = $request->istrxdonasi;
        $istrxkotakinfaq = $request->istrxkotakinfaq;
        $istrxibrankasku = $request->istrxibrankasku;
        $periodelaporan = $request->periodelaporan;
        $sortby = $request->sortby;

        //MEMBUAT PERIODE LAPORAN ====================================
        //mecah dulu
        $periodearray = explode("-", $periodelaporan);
        //hapus spasi
        $periodeawal = trim($periodearray[0]);
        $periodeakhir = trim($periodearray[1]);
        //formatting
        $periodeawal = Carbon::createFromFormat('d/m/Y', $periodeawal)->toDateString();
        $periodeakhir = Carbon::createFromFormat('d/m/Y', $periodeakhir)->toDateString();
       

        //sekarang querying isinya

        $datadonasi = \App\Trxdonasi::select('id','donatur_id','amil_id','tanggaldonasi', 'keterangan', 'jumlahtotal')
                                    //when periode laporan di set dengan benar
                                    ->when(($periodelaporan!= null), function($query) use ($periodeawal, $periodeakhir){
                                        return $query->whereBetween('tanggaldonasi', [$periodeawal, $periodeakhir]);
                                    })
                                    ->with(['donatur'])
                                    ->with(['amil'])
                                    //sortby tanggal desc
                                    ->when(($sortby== 1), function($query){
                                        return $query->orderBy('tanggaldonasi', 'desc');
                                    })
                                    //sortby tanggal asc
                                    ->when(($sortby== 2), function($query){
                                        return $query->orderBy('tanggaldonasi', 'asc');
                                    })
                                    //sortby tanggal desc
                                    ->when(($sortby== 3), function($query){
                                        return $query->orderBy('amil_id', 'asc');
                                    })
                                    //sortby tanggal desc
                                    ->when(($sortby== 4), function($query){
                                        return $query->orderBy('donatur_id', 'asc');
                                    })
                                    ->get();
        
                                    
        $datakotakinfaq = \App\Trxkotakinfaq::select('id','donatur_id','amil_id','tanggaldonasi', 'keterangan', 'jumlahtotal')
                                    //when periode laporan di set dengan benar
                                    ->when(($periodelaporan!= null), function($query) use ($periodeawal, $periodeakhir){
                                        return $query->whereBetween('tanggaldonasi', [$periodeawal, $periodeakhir]);
                                    })
                                    ->with(['donatur'])
                                    ->with(['amil'])
                                    //sortby tanggal desc
                                    ->when(($sortby== 1), function($query){
                                        return $query->orderBy('tanggaldonasi', 'desc');
                                    })
                                    //sortby tanggal asc
                                    ->when(($sortby== 2), function($query){
                                        return $query->orderBy('tanggaldonasi', 'asc');
                                    })
                                    //sortby tanggal desc
                                    ->when(($sortby== 3), function($query){
                                        return $query->orderBy('amil_id', 'asc');
                                    })
                                    //sortby tanggal desc
                                    ->when(($sortby== 4), function($query){
                                        return $query->orderBy('donatur_id', 'asc');
                                    })
                                    ->get();
        


        $dataibrankasku = \App\Trxibrankasku::select('id','donatur_id','amil_id','tanggaldonasi', 'deskripsibarang', 'nominalvaluasi')
                                    //when periode laporan di set dengan benar
                                    ->when(($periodelaporan!= null), function($query) use ($periodeawal, $periodeakhir){
                                        return $query->whereBetween('tanggaldonasi', [$periodeawal, $periodeakhir]);
                                    })
                                    ->with(['donatur'])
                                    ->with(['amil'])
                                    //sortby tanggal desc
                                    ->when(($sortby== 1), function($query){
                                        return $query->orderBy('tanggaldonasi', 'desc');
                                    })
                                    //sortby tanggal asc
                                    ->when(($sortby== 2), function($query){
                                        return $query->orderBy('tanggaldonasi', 'asc');
                                    })
                                    //sortby tanggal desc
                                    ->when(($sortby== 3), function($query){
                                        return $query->orderBy('amil_id', 'asc');
                                    })
                                    //sortby tanggal desc
                                    ->when(($sortby== 4), function($query){
                                        return $query->orderBy('donatur_id', 'asc');
                                    })
                                    ->get();
        


        return view('master/laporan/trxsemua-print', compact('datadonasi','dataibrankasku', 'datakotakinfaq', 'istrxdonasi','istrxkotakinfaq','istrxibrankasku', 'periodelaporan'));
    }


  
    

}
