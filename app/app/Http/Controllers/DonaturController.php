<?php

namespace App\Http\Controllers;

use App\Donatur;
use App\Amil;
use App\Pekerjaandonatur;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DonaturController extends Controller
{

    public $vrule_namadonatur = 'required|min:3';
    public $vrule_isdonaturrutin = 'nullable';
    public $vrule_iskotakinfaq = 'nullable';
    public $vrule_isdonaturinsidental = 'nullable';

    public $vrule_pekerjaandonatur_id = 'required|numeric';
    public $vrule_amil_id = 'required|numeric';
    public $vrule_alamatdonatur = '';
    public $vrule_nomortelepon = '';

    
    public $vrule_tanggallahir = 'dateformat:d/m/Y';
    public $vrule_jeniskelamin = 'numeric|between:1,3';


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = \App\Donatur::select('id','namadonatur', 'alamatdonatur', 'nomortelepondonatur')
                            ->orderBy('namadonatur', 'asc')
                            ->take('500')
                            ->get();


        // dd($data);

        return view('master/donatur/tampilkan', compact('data', 'message'));
    }

    /** DONE
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        //ambil data pekerjaandonatur buat ditampilkan di List Optionnya
        $listpekerjaandonatur = \App\Pekerjaandonatur::where('statusaktif','=','1')
                                                        ->orderBy('namapekerjaandonatur','asc')
                                                        ->take('500')
                                                        ->get();

        //ambil data list amil buat ditampilkan di list Optionnya
        $listamil = \App\Amil::where('statusaktif','=','1')
                                ->orderBy('namaamil','asc')
                                ->take('500')
                                ->get();

        return view('master/donatur/tambah', compact('listpekerjaandonatur', 'listamil'));
    }

    /** 
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // dd($request->all());

        //cek dulu apakah data nya valid ataukah tidak. 
        $validdata = request()->validate([
            'namadonatur' => $this->vrule_namadonatur,
            'isdonaturrutin' => $this->vrule_isdonaturrutin,
            'iskotakinfaq' => $this->vrule_iskotakinfaq,
            'isdonaturinsidental' => $this->vrule_isdonaturinsidental,
            'amil_id' => $this->vrule_amil_id,
            'alamatdonatur' => $this->vrule_alamatdonatur,
            'nomortelepondonatur' => $this->vrule_nomortelepon,
            'tanggallahir' => $this->vrule_tanggallahir,
            'pekerjaandonatur_id' => $this->vrule_pekerjaandonatur_id,
            'jeniskelamin' => $this->vrule_jeniskelamin,            
        ]);

        //set value-nya
        $isdonaturrutin = $request->get('isdonaturrutin')==null ? 0 : 1;
        $iskotakinfaq = $request->get('iskotakinfaq')==null ? 0 : 1;
        $isdonaturinsidental = $request->get('isdonaturinsidental')==null ? 0 : 1;

        //dd(compact('isdonaturrutin', 'iskotakinfaq', 'isdonaturinsidental'));

        //untuk ditampilkan dalam alert boxnya
        $namadonatur = request('namadonatur');
        
        //menambahkan datanya
        $status = Donatur::create([
            'namadonatur' => $request->namadonatur,
            'isdonaturrutin' => $isdonaturrutin,
            'iskotakinfaq' => $iskotakinfaq,
            'isdonaturinsidental' => $isdonaturinsidental,
            'amil_id' => $request->amil_id,
            'alamatdonatur' => $request->alamatdonatur,
            'nomortelepondonatur' => $request->nomortelepondonatur,
            'tanggallahir' => $request->tanggallahir,
            'pekerjaandonatur_id' => $request->pekerjaandonatur_id,
            'jeniskelamin' => $request->jeniskelamin,
        ]); 
        
        //jika sukses menambahkan
        if($status){
            
            $data = \App\Donatur::select('id','namadonatur', 'alamatdonatur', 'nomortelepondonatur')
                                        ->orderBy('namadonatur', 'asc')
                                        ->take('500')
                                        ->get();
            //buat message nya
            $message = [
                'show'  => '1',
                'type' => 'success',
                'content' => 'Alhamdulillah, data '.$namadonatur.' berhasil disimpan!',
                ];
    
            // tampilkan juga
            return view('master/donatur/tampilkan', compact('data', 'message'));
        }
        else{
            return dd('Uups! Error, data gagal masuk ke dalam database');
        } 

        dd($validdata);
    }

    /** DONE
     * Display the specified resource.
     *
     * @param  \App\Donatur  $donatur
     * @return \Illuminate\Http\Response
     */
    public function show(Donatur $donatur)
    {
        //dapatkan data amil
        $amil = $donatur->amil;

        //dapatkan data pekerjaan donatur
        $pekerjaandonatur = $donatur->pekerjaandonatur;

        //biar standar di viewnya
        $data = $donatur;
    
        // dd(compact('data', 'amil','pekerjaandonatur'));
        // tampilkan 
        return view('master/donatur/detail', compact('data', 'amil','pekerjaandonatur'));
     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Donatur  $donatur
     * @return \Illuminate\Http\Response
     */
    public function edit(Donatur $donatur)
    {
        $data = $donatur;
        //ambil data pekerjaandonatur buat ditampilkan di List Optionnya
        $listpekerjaandonatur = \App\Pekerjaandonatur::where('statusaktif','=','1')
                                                        ->orderBy('namapekerjaandonatur','asc')
                                                        ->take('500')
                                                        ->get();

        //ambil data list amil buat ditampilkan di list Optionnya
        $listamil = \App\Amil::where('statusaktif','=','1')
                                ->orderBy('namaamil','asc')
                                ->take('500')
                                ->get();

        return view('master/donatur/edit', compact('data','listpekerjaandonatur', 'listamil'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Donatur  $donatur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Donatur $donatur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Donatur  $donatur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Donatur $donatur)
    {
        //
    }
}
