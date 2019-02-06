<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Donatur;
use App\Amil;
use App\Trxdonasi;
use App\Trxkotakinfaq;
use App\Trxibrankasku;
use Carbon\Carbon;

class Dashboard extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        $smallboxes = [];

        //jumlahdonatur Rutin
        $jumlahdonaturrutin = \App\Donatur::where('isdonaturrutin', 1)->count();
        
        $smallbox = [
            'bg' => 'bg-aqua',
            'number' => $jumlahdonaturrutin,
            'text' => 'Jumlah Donatur Rutin',
            'url' => '/donatur',
            'icon' => 'fa-child',
        ];

        array_push($smallboxes, $smallbox);

        //==============================================
        //Jumlah Donatur Kotak Infaq
        $jumlahdonaturkotakinfaq = \App\Donatur::where('iskotakinfaq', 1)->count();
        
        $smallbox = [
            'bg' => 'bg-aqua',
            'number' => $jumlahdonaturkotakinfaq,
            'text' => 'Jumlah Donatur Kotak Infaq',
            'url' => '/donatur',
            'icon' => 'fa-briefcase',
        ];

        array_push($smallboxes, $smallbox);

        //==============================================
        //Jumlah Donatur insidentil
        $jumlahdonaturinsidental = \App\Donatur::where('isdonaturinsidental', 1)->count();
        
        $smallbox = [
            'bg' => 'bg-aqua',
            'number' => $jumlahdonaturinsidental,
            'text' => 'Jumlah Donatur Insidental',
            'url' => '/donatur',
            'icon' => 'fa-car',
        ];

        array_push($smallboxes, $smallbox);

        //==============================================
        //Jumlah Amil Yang Aktif

        $jumlahamil = \App\Amil::where('statusaktif', 1)->count();
        
        $smallbox = [
            'bg' => 'bg-green',
            'number' => $jumlahamil,
            'text' => 'Jumlah Amil Yang Aktif',
            'url' => '/amil',
            'icon' => 'fa-group',
        ];

        array_push($smallboxes, $smallbox);

        //==============================================
        //Omset TrxDonasi Bulan INi
        $awalbulan = Carbon::now()->startOfMonth();
        $akhirbulan = Carbon::now()->endOfMonth();
        $totaldonasibulanini = \App\Trxdonasi::whereBetween('tanggaldonasi', [$awalbulan, $akhirbulan])->sum('jumlahtotal');
        
        $smallbox = [
            'bg' => 'bg-red',
            'number' => $totaldonasibulanini,
            'text' => 'Total Donasi Bulan Ini',
            'url' => '/trxdonasi',
            'icon' => 'fa-dollar',
        ];

        array_push($smallboxes, $smallbox);

        //==============================================
        //Omset TrxKotakInfaq Bulan INi
        $awalbulan = Carbon::now()->startOfMonth();
        $akhirbulan = Carbon::now()->endOfMonth();
        $totalkotakinfaqbulanini = \App\Trxkotakinfaq::whereBetween('tanggaldonasi', [$awalbulan, $akhirbulan])->sum('jumlahtotal');
        
        $smallbox = [
            'bg' => 'bg-red',
            'number' => $totalkotakinfaqbulanini,
            'text' => 'Total Kotak Infaq Bulan Ini',
            'url' => '/trxkotakinfaq',
            'icon' => 'fa-briefcase',
        ];

        array_push($smallboxes, $smallbox);

        //==============================================
        //Omset TrxiBrankasku Bulan INi
        $awalbulan = Carbon::now()->startOfMonth();
        $akhirbulan = Carbon::now()->endOfMonth();
        $totalibrankaskubulanini = \App\Trxibrankasku::whereBetween('tanggaldonasi', [$awalbulan, $akhirbulan])->sum('nominalvaluasi');
        
        $smallbox = [
            'bg' => 'bg-red',
            'number' => $totalibrankaskubulanini,
            'text' => 'Total iBrankasku Bulan Ini',
            'url' => '/trxibrankasku',
            'icon' => 'fa-gift',
        ];

        array_push($smallboxes, $smallbox);

        //===================================================
        //10 donatur terbaru
        $listdonaturrutinterbaru = \App\Donatur::where('isdonaturrutin', 1)->orderBy('id', 'desc')->take(10)->get();
        $listkotakinfaqterbaru = \App\Donatur::where('iskotakinfaq', 1)->orderBy('id', 'desc')->take(10)->get();

        //data trxdonasi dalam tahun ini
        $donasitahunini = \App\Trxdonasi::selectRaw("sum(jumlahtotal) as jumlah, DATE_FORMAT(tanggaldonasi,'%m') as bulan")
                                        ->whereYear('tanggaldonasi', date('Y'))
                                        ->groupBy('bulan')
                                        ->get();

        //data kotakinfaq dalam tahun ini
        $kotakinfaqtahunini = \App\Trxkotakinfaq::selectRaw("sum(jumlahtotal) as jumlah, DATE_FORMAT(tanggaldonasi,'%m') as bulan")
                                        ->whereYear('tanggaldonasi', date('Y'))
                                        ->groupBy('bulan')
                                        ->get();

        //data ibrankasku dalam tahun ini
        $ibrankaskutahunini = \App\Trxibrankasku::selectRaw("sum(nominalvaluasi) as jumlah, DATE_FORMAT(tanggaldonasi,'%m') as bulan")
                                        ->whereYear('tanggaldonasi', date('Y'))
                                        ->groupBy('bulan')
                                        ->get();

        // dd($donasitahunini);

        //buat array untuk barchart

        $barchart = [];

        for($i = 0; $i<12; $i++){
            $barchart[] = (Object) array('bulan'=>($i+1),'trxdonasi'=>0, 'trxkotakinfaq' => 0, 'trxibrankasku' => 0);
        }

        //mengisi data donasi
        foreach($donasitahunini as $item){
            for($i = 0; $i<12; $i++){
                if($item->bulan == $i+1){
                    $barchart[$i]->trxdonasi = $item->jumlah;
                }
            }
        }
        
        //mengisi data kotakinfaq
        foreach($kotakinfaqtahunini as $item){
            for($i = 0; $i<12; $i++){
                if($item->bulan == $i+1){
                    $barchart[$i]->trxkotakinfaq = $item->jumlah;
                }
            }
        }

        //mengisi data kotakinfaq
        foreach($ibrankaskutahunini as $item){
            for($i = 0; $i<12; $i++){
                if($item->bulan == $i+1){
                    $barchart[$i]->trxibrankasku = $item->jumlah;
                }
            }
        }



        

        

        return view('/master/dashboard/index', compact('smallboxes', 'listdonaturrutinterbaru', 'listkotakinfaqterbaru', 'barchart'));
    }


    //kompilasi apa yang ditampilkan dalam dashboard disini yuk mas bro
}
