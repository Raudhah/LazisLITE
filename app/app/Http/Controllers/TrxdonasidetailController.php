<?php

namespace App\Http\Controllers;

use App\Trxdonasidetail;
use Illuminate\Http\Request;

class TrxdonasidetailController extends Controller
{
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
        //
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
     * @param  \App\Trxdonasidetail  $trxdonasidetail
     * @return \Illuminate\Http\Response
     */
    public function show(Trxdonasidetail $trxdonasidetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Trxdonasidetail  $trxdonasidetail
     * @return \Illuminate\Http\Response
     */
    public function edit(Trxdonasidetail $trxdonasidetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Trxdonasidetail  $trxdonasidetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trxdonasidetail $trxdonasidetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Trxdonasidetail  $trxdonasidetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trxdonasidetail $trxdonasidetail)
    {
        //
    }
}
