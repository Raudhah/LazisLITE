<?php

namespace App\Http\Controllers;

use App\peruntukandonasi;
use Illuminate\Http\Request;

class peruntukandonasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = \App\peruntukandonasi::all();

        // $message = [
        //     'show'  => '1',
        //     'type' => 'success',
        //     'content' => 'Yes, data berhasil disimpan',
        //     ];

        return view('master/peruntukandonasi/tampilkan', compact('data', 'message'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master/peruntukandonasi/tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validdata = request()->validate([
            'namaperuntukandonasi' => ['required', 'min:3'],
            'statusaktif' => ['required', 'boolean']
        ]);

        $data = request(['namaperuntukandonasi', 'statusaktif']);
        $namaperuntukandonasi = request('namaperuntukandonasi');
        
        if(peruntukandonasi::create($data)){

    
                $data = \App\peruntukandonasi::all();

                $message = [
                    'show'  => '1',
                    'type' => 'success',
                    'content' => 'Alhamdulillah, data '.$namaperuntukandonasi.' berhasil disimpan!',
                    ];
        
                return view('master/peruntukandonasi/tampilkan', compact('data', 'message'));
        }
        else{
            return dd('Uups! Error, data gagal masuk ke dalam database');
        }           

    }



    /**
     * Display the specified resource.
     *
     * @param  \App\peruntukandonasi  $peruntukandonasi
     * @return \Illuminate\Http\Response
     */
    public function show(peruntukandonasi $peruntukandonasi)
    {
        return redirect('/peruntukandonasi');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\peruntukandonasi  $peruntukandonasi
     * @return \Illuminate\Http\Response
     */
    public function edit(peruntukandonasi $peruntukandonasi)
    {
        //
        $data = $peruntukandonasi;
        return view('master/peruntukandonasi/edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\peruntukandonasi  $peruntukandonasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, peruntukandonasi $peruntukandonasi)
    {
        $peruntukandonasi->namaperuntukandonasi = request('namaperuntukandonasi');
        $peruntukandonasi->statusaktif = request('statusaktif');

        $status = $peruntukandonasi->save();

        $namaperuntukandonasi = request('namaperuntukandonasi');

        if($status){
            $data = \App\peruntukandonasi::all();
            $message = [
                        'show'  => 1,
                        'type' => 'success',
                        'content' => 'Alhamdulillah, Data '.$namaperuntukandonasi.' Berhasil di Update',
                        ];

            return view('master/peruntukandonasi/tampilkan', compact('data', 'message'));

        }
        else{
            dd('Ooops, data gagal diupdate dari database ');
        }


        return redirect('/peruntukandonasi');
    }

   /**
     * Show the form for DELETing the specified resource.
     *
     * @param  \App\peruntukandonasi  $peruntukandonasi
     * @return \Illuminate\Http\Response
     */
    public function delete(peruntukandonasi $peruntukandonasi)
    {
        //
        $data = $peruntukandonasi;
        return view('master/peruntukandonasi/delete',compact('data'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\peruntukandonasi  $peruntukandonasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(peruntukandonasi $peruntukandonasi)
    {
        // dd($peruntukandonasi);

        $namaperuntukandonasi = $peruntukandonasi->namaperuntukandonasi;
        $status = $peruntukandonasi->delete();


        if($status){
            $data = \App\peruntukandonasi::all();
            $message = [
                        'show'  => 1,
                        'type' => 'success',
                        'content' => 'Alhamdulillah, Data '.$namaperuntukandonasi.' Berhasil di Hapus',
                        ];

            return view('master/peruntukandonasi/tampilkan', compact('data', 'message'));

        }
        else{
            dd('Ooops, data gagal dihapus dari database ');
        }

        return redirect('/peruntukandonasi');
    }

    public function tester(){
        //dd('saya dipanggil disini');
        $this->index("Coba kirim message");
    }
}
