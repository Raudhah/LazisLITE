<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Amil;
use App\Donatur;
use App\Trxdonasi;
use App\Trxkotakinfaq;
use App\Trxibrankasku;
use Carbon\Carbon;

class KuitansiMassalController extends Controller
{

     //validation rule
     public $vrule_istrxdonasi = 'required_without_all:istrxkotakinfaq,istrxibrankasku';
     public $vrule_istrxkotakinfaq = 'required_without_all:istrxdonasi,istrxibrankasku';
     public $vrule_istrxibrankasku = 'required_without_all:istrxdonasi,istrxkotakinfaq';
     
     public $vrule_periodelaporan = 'required';
     
     //vrule urutkan berdasarkan
     public $vrule_sortby = 'required';
     public $vrule_amil_id = 'required|numeric';

     public function __construct(){
         $this->middleware('auth');
     }


    public function index(){
        //ambil data list amil buat ditampilkan di list Optionnya
        $listamil = \App\Amil::orderBy('namaamil','asc')->get();

        return view('master/kuitansimassal/kuitansimassal-form', compact('listamil'));
    }

    public function tampilkan(Request $request){

        //cek dulu apakah data nya valid ataukah tidak. 
        $validdata = request()->validate([
            'istrxdonasi' => $this->vrule_istrxdonasi,
            'istrxkotakinfaq' => $this->vrule_istrxkotakinfaq,
            'istrxibrankasku' => $this->vrule_istrxibrankasku,
            'periodelaporan' => $this->vrule_periodelaporan,
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
       
        //konfignya
        $konfig = \App\Konfigurasi::first();


        //sekarang querying isinya

        $dataibrankasku = $datakotakinfaq = $datadonasi = null;

        if($istrxdonasi != null){
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

        }
        
        if($istrxkotakinfaq != null){
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

        }                         

        if($istrxibrankasku != null){
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

        }

        return view('master/kuitansimassal/kuitansimassal', compact('listamil', 'datadonasi', 'datakotakinfaq', 'dataibrankasku', 'istrxdonasi', 'istrxkotakinfaq', 'istrxibrankasku', 'konfig'));
        
        


  
        
    }


}
