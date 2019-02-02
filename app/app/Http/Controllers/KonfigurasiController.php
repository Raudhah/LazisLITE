<?php

namespace App\Http\Controllers;

use App\Konfigurasi;
use Illuminate\Http\Request;

class KonfigurasiController extends Controller
{

        public $vrule_namalaz           = 'required|min3';
        public $vrule_kodelaz           = 'required|min3';
        public $vrule_namacabang        = 'required|min3';
        public $vrule_kodecabang        = 'required|min3';
        public $vrule_alamatcabang      = 'required|min3';
        public $vrule_nomorteleponcabang    = 'required|min3';
        public $vrule_websitecabang     = 'required|min3';
        public $vrule_emailcabang       = 'required|min3';
        public $vrule_nomorrekeningcabang   = 'required|min3';
        public $vrule_keterangan            = 'required|min3';
        public $vrule_tekskuitansi          = 'required|min3';
        public $vrule_namafilelogo      = 'required|min3';
        public $vrule_namafilettd       = 'required|min3';
        public $vrule_namafilebackground    = 'required|min3';


        public function __construct(){
            $this->middleware('auth');
        }
        
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //buat message nya
        $message = [
            'show'  => '1',
            'type' => 'info',
            'content' => 'Semua Bagian harus terisi. Biarkan pada bagian File, kecuali Anda ingin mengubah File. ',
            ];
            
        $data = \App\Konfigurasi::first();
        return view('master/konfigurasi/edit', compact('data', 'message'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Konfigurasi  $konfigurasi
     * @return \Illuminate\Http\Response
     */
    public function show(Konfigurasi $konfigurasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Konfigurasi  $konfigurasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Konfigurasi $konfigurasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Konfigurasi  $konfigurasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Konfigurasi $konfigurasi)
    {


        


        // dd($path);
    
        $konfigurasi->namalaz   = $request->namalaz;
        $konfigurasi->kodelaz   = $request->kodelaz;
        $konfigurasi->namacabang    = $request->namacabang;
        $konfigurasi->kodecabang    = $request->kodecabang;
        $konfigurasi->alamatcabang  = $request->alamatcabang;
        $konfigurasi->nomorteleponcabang    = $request->nomorteleponcabang;
        $konfigurasi->websitecabang = $request->websitecabang;
        $konfigurasi->emailcabang   = $request->emailcabang;
        $konfigurasi->nomorrekeningcabang   = $request->nomorrekeningcabang;
        $konfigurasi->keterangan    = $request->keterangan;
        $konfigurasi->tekskuitansi  = $request->tekskuitansi;
        //ini yang filenya,

        //handle file dulu jika ada
        // cache the file
        $filelogo = $request->file('filelogo');
        $filettd = $request->file('filettd');
        $filebackground = $request->file('filebackground');

        if($filelogo!=null){
            // generate a new filename. getClientOriginalExtension() for the file extension
            $filename = 'logolaz.' . $filelogo->getClientOriginalExtension();
            // save to storage/app/public/logolaz. as the new $filename
            $path = $filelogo->storeAs('public',$filename);

            $konfigurasi->namafilelogo  = $filename;
        }

        if($filettd!=null){
            // generate a new filename. getClientOriginalExtension() for the file extension
            $filename = 'ttdlaz.' . $filettd->getClientOriginalExtension();
            // save to storage/app/public/ttdlaz. as the new $filename
            $path = $filettd->storeAs('public',$filename);

            $konfigurasi->namafilettd  = $filename;
        }

        if($filebackground!=null){
            // generate a new filename. getClientOriginalExtension() for the file extension
            $filename = 'backgroundlaz.' . $filebackground->getClientOriginalExtension();
            // save to storage/app/public/backgroundlaz. as the new $filename
            $path = $filebackground->storeAs('public',$filename);

            $konfigurasi->namafilebackground  = $filename;
        }

        
        $status = $konfigurasi->save();

        if($status){
                //buat message nya anything happen
                $message = [
                    'show'  => '1',
                    'type' => 'success',
                    'content' => 'Alhamdulillah,Konfigurasi berhasil disimpan!',
                    ];
                    
                //tampilkan lagi datanya
                $data = $konfigurasi;
                return view('master/konfigurasi/edit', compact('data', 'message'));

        }else{
            dd("Uuups, gagal mengupdate di database");
        }


    }


    public function backup()
    {
        return view('master/konfigurasi/backupform');
    }
}
