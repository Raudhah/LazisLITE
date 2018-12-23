<?php

namespace App\Http\Controllers;

use App\Amil;
use Illuminate\Http\Request;

class AmilController extends Controller
{

    public $vrule_namaamil = 'required|min:3';
    public $vrule_statusaktif = 'required|boolean';

    /** DONE
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = \App\Amil:: orderBy('statusaktif', 'desc')
                            ->orderBy('namaamil', 'asc')
                            ->take('500')
                            ->get();


        // $data = \App\Amil::getTopLatest();
        return view('master/amil/tampilkan', compact('data', 'message'));
    }

    /**DONE 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master/amil/tambah');
    }

    /**DONE
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //cek dulu apakah data nya valid ataukah tidak. 
        $validdata = request()->validate([
            'namaamil' => $this->vrule_namaamil,
            'alamatamil' => '',
            'nomorteleponamil' => '',
            'statusaktif' => $this->vrule_statusaktif
        ]);

        //untuk ditampilkan dalam alert boxnya
        $namaamil = request('namaamil');
        
        //jika sukses menambahkan
        if(amil::create($validdata)){
            
            $data = \App\amil:: orderBy('statusaktif', 'desc')
                                            ->orderBy('namaamil', 'asc')
                                            ->take('500')
                                            ->get();
            //buat message nya
            $message = [
                'show'  => '1',
                'type' => 'success',
                'content' => 'Alhamdulillah, data '.$namaamil.' berhasil disimpan!',
                ];
    
            // tampilkan juga
            return view('master/amil/tampilkan', compact('data', 'message'));
        }
        else{
            return dd('Uups! Error, data gagal masuk ke dalam database');
        }           
    }

    /** NOTHING TO DO HERE
     * Display the specified resource.
     *
     * @param  \App\Amil  $amil
     * @return \Illuminate\Http\Response
     */
    public function show(Amil $amil)
    {
        //
    }

    /** DONE
     * Show the form for editing the specified resource.
     *
     * @param  \App\Amil  $amil
     * @return \Illuminate\Http\Response
     */
    public function edit(Amil $amil)
    {
        $data = $amil;
        return view('master/amil/edit',compact('data'));
    }

    /** DONE 
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Amil  $amil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Amil $amil)
    {
        //cek dulu apakah data nya valid ataukah tidak. 
        $validdata = request()->validate([
            'namaamil' => $this->vrule_namaamil,
            'alamatamil' => '',
            'nomorteleponamil' => '',
            'statusaktif' => $this->vrule_statusaktif
        ]);

        $amil->namaamil         = request('namaamil');
        $amil->alamatamil       = request('alamatamil');
        $amil->nomorteleponamil = request('nomorteleponamil');
        $amil->statusaktif      = request('statusaktif');
        //simpan
        $status = $amil->save();
        //dapatkan nama amil untuk messagenya
        $namaamil = request('namaamil');

        //jika sukses menambahkan
        if($status){

            $data = \App\amil:: orderBy('statusaktif', 'desc')
                                            ->orderBy('namaamil', 'asc')
                                            ->take('500')
                                            ->get();
            //buat message nya
            $message = [
                'show'  => '1',
                'type' => 'success',
                'content' => 'Alhamdulillah, data '.$namaamil.' berhasil diUpdate!',
                ];

            // tampilkan juga
            return view('master/amil/tampilkan', compact('data', 'message'));
        }
        else{
            return dd('Uups! Error, data gagal di Update ke dalam database');
        }    

        
    }
    /** DONE
     * 
     */
    public function delete(Amil $amil){
        $data = $amil;
        return view('master/amil/delete',compact('data'));
    }

    /** DONE
     * Remove the specified resource from storage.
     *
     * @param  \App\Amil  $amil
     * @return \Illuminate\Http\Response
     */ 
    public function destroy(Amil $amil)
    {
        //dapatkan namanya dulu sebelum hapus
        $namaamil = $amil->namaamil;
        
        //menghapus
        $status = $amil->delete();


        //jika sukses menambahkan
        if($status){

            $data = \App\amil:: orderBy('statusaktif', 'desc')
                                            ->orderBy('namaamil', 'asc')
                                            ->take('500')
                                            ->get();
            //buat message nya
            $message = [
                'show'  => '1',
                'type' => 'success',
                'content' => 'Alhamdulillah, data '.$namaamil.' berhasil di Hapus!',
                ];

            // tampilkan juga
            return view('master/amil/tampilkan', compact('data', 'message'));
        }
        else{
            return dd('Uups! Error, data gagal di HAPUS ke dalam database');
        }    


    }

    /** DONE
     * FORM Cari data Amil*/
    public function search(){
        //tampilkan form pencarian
        return view('master/amil/search');
    }

    /** DONE 
     * MENCARI  data Amil*/
    public function searchResult(Request $request){
        //get the keyword criteria
        $namaamil           = $request->namaamil;
        $alamatamil         = $request->alamatamil;
        $nomorteleponamil   = $request->nomorteleponamil;
        $statusaktif        = $request->statusaktif;

        if(2 == $statusaktif){
            //semua status, alias quary WHERE statusaktif tidak perlu include disini
            $data = \App\Amil:: where('alamatamil','like','%'.$alamatamil.'%')
                                ->where('namaamil','like','%'.$namaamil.'%')
                                ->where('nomorteleponamil','like','%'.$nomorteleponamil.'%')
                                ->orderBy('statusaktif', 'desc')
                                ->orderBy('namaamil', 'asc')
                                ->take('500')
                                ->get();

        }
        else{            
            //status yang dicari saja
            $data = \App\Amil:: where('alamatamil','like','%'.$alamatamil.'%')
                                ->where('namaamil','like','%'.$namaamil.'%')
                                ->where('nomorteleponamil','like','%'.$nomorteleponamil.'%')
                                ->where('statusaktif','=',$statusaktif)
                                ->orderBy('statusaktif', 'desc')
                                ->orderBy('namaamil', 'asc')
                                ->take('500')
                                ->get();
        }

                        
        // $data = \App\Amil::getTopLatest();
        return view('master/amil/tampilkan', compact('data'));        


        dd(compact('namaamil', 'alamatamil', 'nomorteleponamil', 'statusaktif'));
    }
}
