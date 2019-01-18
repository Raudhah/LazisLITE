<?php

namespace App\Http\Controllers;

use App\Trxibrankasku;
//dependency relations untuk modelnya
use App\Amil;
use App\peruntukandonasi;
use App\Donatur;
use Illuminate\Http\Request;

class TrxibrankaskuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = \App\Trxibrankasku::select('id','tanggaldonasi', 'deskripsibarang', 'nominalvaluasi')
                                    ->orderBy('id', 'desc')
                                    ->take('500')
                                    ->get();

        
        dd($data);

        return view('master/trxibrankasku/tampilkan', compact('data', 'message'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //ambil data peruntukandonasi buat ditampilkan di List Optionnya
        $listperuntukandonasi = \App\peruntukandonasi::where('statusaktif','=','1')
                                              ->orderBy('namaperuntukandonasi','asc')
                                              ->take('500')
                                              ->get();

        //ambil data list amil buat ditampilkan di list Optionnya
        $listamil = \App\Amil::where('statusaktif','=','1')
                                ->orderBy('namaamil','asc')
                                ->take('500')
                                ->get();

        return view('master/trxibrankasku/tambah', compact('listperuntukandonasi', 'listamil'));
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
     * @param  \App\Trxibrankasku  $trxibrankasku
     * @return \Illuminate\Http\Response
     */
    public function show(Trxibrankasku $trxibrankasku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Trxibrankasku  $trxibrankasku
     * @return \Illuminate\Http\Response
     */
    public function edit(Trxibrankasku $trxibrankasku)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Trxibrankasku  $trxibrankasku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trxibrankasku $trxibrankasku)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Trxibrankasku  $trxibrankasku
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trxibrankasku $trxibrankasku)
    {
        //
    }
}
