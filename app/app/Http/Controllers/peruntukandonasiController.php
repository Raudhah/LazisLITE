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
        //
        $data = \App\peruntukandonasi::all();
        return $data;
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
     * @param  \App\peruntukandonasi  $peruntukandonasi
     * @return \Illuminate\Http\Response
     */
    public function show(peruntukandonasi $peruntukandonasi)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\peruntukandonasi  $peruntukandonasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(peruntukandonasi $peruntukandonasi)
    {
        //
    }
}
