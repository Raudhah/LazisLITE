<?php

namespace App\Http\Controllers;

use App\peruntukandonasi;
use Illuminate\Http\Request;

class peruntukandonasiController extends Controller
{
    public $vrule_namaperuntukandonasi = 'required|min:3';
    public $vrule_statusaktif = 'required|boolean';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = \App\peruntukandonasi:: orderBy('statusaktif', 'desc')
                                        ->orderBy('namaperuntukandonasi', 'asc')
                                        ->take('500')
                                        ->get();
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
        //cek dulu apakah data nya valid ataukah tidak. 
        $validdata = request()->validate([
            'namaperuntukandonasi' => $this->vrule_namaperuntukandonasi,
            'statusaktif' => $this->vrule_statusaktif
        ]);

        //untuk ditampilkan dalam alert boxnya
        $namaperuntukandonasi = request('namaperuntukandonasi');
        
        //jika sukses menambahkan
        if(peruntukandonasi::create($validdata)){
            
            $data = \App\peruntukandonasi:: orderBy('statusaktif', 'desc')
                                            ->orderBy('namaperuntukandonasi', 'asc')
                                            ->take('500')
                                            ->get();
            //buat message nya
            $message = [
                'show'  => '1',
                'type' => 'success',
                'content' => 'Alhamdulillah, data '.$namaperuntukandonasi.' berhasil disimpan!',
                ];
    
            // tampilkan juga
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

        $validdata = request()->validate([
            'namaperuntukandonasi' => $this->vrule_namaperuntukandonasi,
            'statusaktif' => $this->vrule_statusaktif
        ]);
        
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

    public function tampilkan($status, $nama, $message){
        
    }

    public function tester(){
        //dd('saya dipanggil disini');
        $this->index("Coba kirim message");
    }
}
