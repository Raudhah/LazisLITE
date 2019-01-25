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

class LaporanAmilController extends Controller
{
        //validation rule
        public $vrule_istrxdonasi = 'required_without_all:istrxkotakinfaq,istrxibrankasku';
        public $vrule_istrxkotakinfaq = 'required_without_all:istrxdonasi,istrxibrankasku';
        public $vrule_istrxibrankasku = 'required_without_all:istrxdonasi,istrxkotakinfaq';
        
        //bagaimana cara validasi date range nya?
        public $vrule_periodelaporan = 'required';
        public $vrule_tipelaporan = 'required';
        
        //vrule urutkan berdasarkan
        public $vrule_sortby = 'required';
        public $vrule_amil_id = 'required|numeric';


//===========================================================================================
//      FUNGSI TAMPIL PROSES
//===========================================================================================
    // FUNGSI tampilkan form untuk IO Laporan
    public function semuaTrx(){

        //ambil data list amil buat ditampilkan di list Optionnya
        $listamil = \App\Amil::orderBy('namaamil','asc')->get();

        return view('master/laporan/trxamil-form', compact('listamil'));
    }


//===========================================================================================
//      FUNGSI MENQUERYKAN PROSESNYA
//===========================================================================================
    //proses formnya disini untuk kemudian kita tampilkan bareng-bareng
    public function semuaTrxProses(Request $request){

        // dd($request->all());

        //cek dulu apakah data nya valid ataukah tidak. 
        $validdata = request()->validate([
            'istrxdonasi' => $this->vrule_istrxdonasi,
            'istrxkotakinfaq' => $this->vrule_istrxkotakinfaq,
            'istrxibrankasku' => $this->vrule_istrxibrankasku,
            'periodelaporan' => $this->vrule_periodelaporan,
            'tipelaporan' => $this->vrule_tipelaporan,
            'amil_id'       => $this->vrule_amil_id,
            'sortby' => $this->vrule_sortby,
        ]);

        //DAPATKAN VARIABELNYA =================================
        $istrxdonasi = $request->istrxdonasi;
        $istrxkotakinfaq = $request->istrxkotakinfaq;
        $istrxibrankasku = $request->istrxibrankasku;
        $periodelaporan = $request->periodelaporan;
        $amil_id = $request->amil_id;
        $tipelaporan = $request->tipelaporan;
        $sortby = $request->sortby;

        //DAPATKAN DATA AMIL =================================
        $dataamil = \App\Amil::find($request->amil_id);


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
                                    ->where('amil_id','=',$request->amil_id)
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
                                    ->where('amil_id','=',$request->amil_id)
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
                                    ->where('amil_id','=',$request->amil_id)
                                    ->get();
        

        if($tipelaporan == 1){
            return view('master/laporan/trxamil-print', compact('tipelaporan','dataamil', 'datadonasi','dataibrankasku', 'datakotakinfaq', 'istrxdonasi','istrxkotakinfaq','istrxibrankasku', 'periodelaporan'));
        }

        //MENAMPILKAN DATA DONATUR DALAM TANGGUNGANNYA YANG SUDAH TERAMBIL
        if($tipelaporan == 2){
            //dapatkan donatur yang jadi tanggungan dari amil ini
            $datadonatur = \App\Donatur::where('amil_id','=',$amil_id)->get();
            $listdonaturid = \App\Donatur::select('id')
                                        ->where('amil_id','=',$amil_id)
                                        ->get();



            $datadonasi = \App\Trxdonasi::select('id','donatur_id','amil_id', 'insidentil', 'tanggaldonasi', 'keterangan', 'jumlahtotal')
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
                                            ->whereIn('donatur_id', $listdonaturid)
                                            ->get();

            $datakotakinfaq = \App\Trxkotakinfaq::select('id','donatur_id','amil_id', 'tanggaldonasi', 'keterangan', 'jumlahtotal')
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
                                            ->whereIn('donatur_id', $listdonaturid)
                                            ->get();

            // dd($datadonasi);

            
            $datadonaturrutin = \App\Donatur::where('amil_id','=',$amil_id)->where('isdonaturrutin','1')->get();
            $datadonaturkotakinfaq = \App\Donatur::where('amil_id','=',$amil_id)->where('iskotakinfaq','1')->get();
            $datadonaturinsidental = \App\Donatur::where('amil_id','=',$amil_id)->where('isdonaturinsidental','1')->get();

            return view('master/laporan/trxamil-print', compact('datadonasi', 'datakotakinfaq', 'tipelaporan','periodelaporan','dataamil', 'datadonatur', 'datadonaturrutin', 'datadonaturkotakinfaq', 'datadonaturinsidental'));
        }

        //MENAMPILKAN DATA DONATUR DALAM TANGGUNGANNYA YANG BELUM TERAMBIL
        if($tipelaporan == 3){

            //dapatkan dulu data donaturnya, list berdasarkan ininya
            $datadonatur = \App\Donatur::where('amil_id','=',$amil_id)->orderBy('isdonaturrutin')->orderBy('iskotakinfaq')->get();
          

            // dd($datadonatur);
            //list donatur yang jadi tanggungan dari amil tersebut
            $listdonaturid = \App\Donatur::select('id')->where('amil_id','=',$amil_id)->get();

            //dapatkan list transaksi donasi yang sudah terambil dalam periodenya
            $datadonasi = \App\Trxdonasi::select('id','donatur_id','amil_id', 'insidentil', 'tanggaldonasi', 'keterangan', 'jumlahtotal')
                                            //when periode laporan di set dengan benar
                                            ->when(($periodelaporan!= null), function($query) use ($periodeawal, $periodeakhir){
                                                return $query->whereBetween('tanggaldonasi', [$periodeawal, $periodeakhir]);
                                            })
                                            ->with(['amil'])
                                            ->whereIn('donatur_id',$listdonaturid)
                                            ->get();

            //dapatkan list transaksi kotak infaq yang sudah terambil dalam periodenya
            $datakotakinfaq = \App\Trxkotakinfaq::select('id','donatur_id','amil_id', 'tanggaldonasi', 'keterangan', 'jumlahtotal')
                                            //when periode laporan di set dengan benar
                                            ->when(($periodelaporan!= null), function($query) use ($periodeawal, $periodeakhir){
                                                return $query->whereBetween('tanggaldonasi', [$periodeawal, $periodeakhir]);
                                            })
                                            ->with(['amil'])
                                            ->whereIn('donatur_id',$listdonaturid)
                                            ->get();

            return view('master/laporan/trxamil-print', compact('datadonasi', 'dataamil','datakotakinfaq', 'tipelaporan','periodelaporan','datadonatur'));

        }
        

        //MENAMPILKAN SELURUH DAFTAR DONATUR YANG MENJADI TANGGUNGAN DARI AMIL INI
        if($tipelaporan == 4){

            $datadonatur = \App\Donatur::where('amil_id','=',$amil_id)->get();
            $datadonaturrutin = \App\Donatur::where('amil_id','=',$amil_id)->where('isdonaturrutin','1')->get();
            $datadonaturkotakinfaq = \App\Donatur::where('amil_id','=',$amil_id)->where('iskotakinfaq','1')->get();
            $datadonaturinsidental = \App\Donatur::where('amil_id','=',$amil_id)->where('isdonaturinsidental','1')->get();

            return view('master/laporan/trxamil-print', compact('tipelaporan','dataamil', 'datadonatur', 'datadonaturrutin', 'datadonaturkotakinfaq', 'datadonaturinsidental'));
        }

    }

    
}
