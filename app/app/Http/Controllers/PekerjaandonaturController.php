<?php

namespace App\Http\Controllers;

use App\Pekerjaandonatur;
use Illuminate\Http\Request;

class PekerjaandonaturController extends Controller
{

    public $vrule_namapekerjaandonatur = 'required|min:3';
    public $vrule_statusaktif = 'required|boolean';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = \App\Pekerjaandonatur:: orderBy('statusaktif', 'desc')
                                        ->orderBy('namapekerjaandonatur', 'asc')
                                        ->take('500')
                                        ->get();
        

        // $data = \App\Pekerjaandonatur::getTopLatest();
        return view('master/pekerjaandonatur/tampilkan', compact('data', 'message'));
    }

    /** DONE
     * Menampilkan form tambah
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master/pekerjaandonatur/tambah');
    }

    /** DONE
     * Menyimpan data .
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //cek dulu apakah data nya valid ataukah tidak. 
        $validdata = request()->validate([
            'namapekerjaandonatur' => $this->vrule_namapekerjaandonatur,
            'statusaktif' => $this->vrule_statusaktif
        ]);

        //untuk ditampilkan dalam alert boxnya
        $namapekerjaandonatur = request('namapekerjaandonatur');
        
        //jika sukses menambahkan
        if(pekerjaandonatur::create($validdata)){
            
            $data = \App\pekerjaandonatur:: orderBy('statusaktif', 'desc')
                                            ->orderBy('namapekerjaandonatur', 'asc')
                                            ->take('500')
                                            ->get();
            //buat message nya
            $message = [
                'show'  => '1',
                'type' => 'success',
                'content' => 'Alhamdulillah, data '.$namapekerjaandonatur.' berhasil disimpan!',
                ];
    
            // tampilkan juga
            return view('master/pekerjaandonatur/tampilkan', compact('data', 'message'));
        }
        else{
            return dd('Uups! Error, data gagal masuk ke dalam database');
        }           

    }

    /** NOTHING TO BE DONE HERE
     * Display the specified resource.
     *
     * @param  \App\Pekerjaandonatur  $pekerjaandonatur
     * @return \Illuminate\Http\Response
     */
    public function show(Pekerjaandonatur $pekerjaandonatur)
    {
        //
    }

    /** DONE
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pekerjaandonatur  $pekerjaandonatur
     * @return \Illuminate\Http\Response
     */
    public function edit(Pekerjaandonatur $pekerjaandonatur)
    {
        $data = $pekerjaandonatur;
        return view('master/pekerjaandonatur/edit',compact('data'));
    }

    /** DONE
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pekerjaandonatur  $pekerjaandonatur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pekerjaandonatur $pekerjaandonatur)
    {
        $validdata = request()->validate([
            'namapekerjaandonatur' => $this->vrule_namapekerjaandonatur,
            'statusaktif' => $this->vrule_statusaktif
        ]);
        
        $pekerjaandonatur->namapekerjaandonatur = request('namapekerjaandonatur');
        $pekerjaandonatur->statusaktif = request('statusaktif');

        $status = $pekerjaandonatur->save();

        $namapekerjaandonatur = request('namapekerjaandonatur');

        if($status){
            $data = \App\Pekerjaandonatur:: orderBy('statusaktif', 'desc')
                                        ->orderBy('namapekerjaandonatur', 'asc')
                                        ->take('500')
                                        ->get();
            $message = [
                        'show'  => 1,
                        'type' => 'success',
                        'content' => 'Alhamdulillah, Data '.$namapekerjaandonatur.' Berhasil di Update',
                        ];

            return view('master/pekerjaandonatur/tampilkan', compact('data', 'message'));

        }
        else{
            dd('Ooops, data gagal diupdate dari database ');
        }


        return redirect('/pekerjaandonatur');
    }


    /**
     * Show the form for DELETing the specified resource.
     *
     * @param  \App\pekerjaandonatur  $pekerjaandonatur
     * @return \Illuminate\Http\Response
     */
    public function delete(pekerjaandonatur $pekerjaandonatur)
    {
        //
        $data = $pekerjaandonatur;
        return view('master/pekerjaandonatur/delete',compact('data'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pekerjaandonatur  $pekerjaandonatur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pekerjaandonatur $pekerjaandonatur)
    {
        //dapatkan namanya dulu sebelum hapus
        $namapekerjaandonatur = $pekerjaandonatur->namapekerjaandonatur;
        
        //menghapus
        $status = $pekerjaandonatur->delete();

        //jika sukses, tampilkan list beserta message jika sukses
        if($status){
            $data = \App\Pekerjaandonatur:: orderBy('statusaktif', 'desc')
                                            ->orderBy('namapekerjaandonatur', 'asc')
                                            ->take('500')
                                            ->get();
            //kompilasi pesan
            $message = [
                        'show'  => 1,
                        'type' => 'success',
                        'content' => 'Alhamdulillah, data '.$namapekerjaandonatur.' berhasil dihapus ',
                        ];
            
            //load viewnya
            return view('master/pekerjaandonatur/tampilkan', compact('data', 'message')); 
        }
        else{
            dd('Ooops, data gagal dihapus dari database ');
        }

        //return redirect('/pekerjaandonatur');
    }

}
