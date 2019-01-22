<?php

namespace App\Http\Controllers;

use App\Konfigurasi;
use Illuminate\Http\Request;

class KonfigurasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Konfigurasi  $konfigurasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Konfigurasi $konfigurasi)
    {
        //
    }
}
