<!-- // dashboard -->

@extends('master.layout')

<!-- //========== SITE TITLE ======== -->
@section('pagename', 'Data Dashboard')

<!-- //========== MODUL HEADER ========== -->
@section('modulname', 'Dashboard')

@section('modulsection', 'Tampilkan')
@section('modulicon', 'fa fa-list')

<!-- //===========BOX  HEADER =========== -->
@section('boxheader-title', 'Tampilkan Data Dashboard')

@section('boxheader-instruction', 'Hanya Dashboard dengan status "aktif" yang muncul saat Transaksi / Tambah Donatur')

<!-- //===========BOX MESSAGE, for ANY ALERT AVAILABLE =========== -->
@section('boxmessage')

    <!--//ambil dari file untuk formatnya   -->
    @include('master/general/boxmessage')
    
@endsection

<!-- //========== BOX CONTENT =========== -->
@section('boxcontent')
    <div class="box"><h1>Ini adalah Dashboard</h1></div>

@endsection



<!-- //===========BOX  FOOTER ===========   -->
@section('boxfooter')

@endsection

<!-- //===========SCRIPT FOR THE FOOTER  ===========   -->
@section('footer-code')


    
@endsection
