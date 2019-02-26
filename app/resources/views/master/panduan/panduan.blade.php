
<!-- // amil -->

@extends('master.layout')

<!-- //========== SITE TITLE ======== -->
@section('pagename', 'Petunjuk Penggunaan Untuk Admin   ')

<!-- //========== MODUL HEADER ========== -->
@section('modulname', 'Panduan Admin')

@section('modulsection', 'Detail')
@section('modulicon', 'fa fa-trash')

<!-- //===========BOX  HEADER =========== -->
@section('boxheader-title', 'panduan Bagi Admin harian Laz')

@section('boxheader-instruction', '')

<!-- //===========BOX MESSAGE, for ANY ALERT AVAILABLE =========== -->
@section('boxmessage')

    <!--//ambil dari file untuk formatnya   -->
    @include('master/general/boxmessage')
    
@endsection


<!-- //========== BOX CONTENT =========== -->
@section('boxcontent')
   


@if (auth::user()->levelakses == 1)
    <a class="btn btn-success btn-lg" href="/storage/panduanadmin.pdf" target="_blank">Buka Panduan Admin</a>      
@else
    <a class="btn btn-success btn-lg" href="/storage/panduansuperadmin.pdf" target="_blank">Buka Panduan</a>
@endif


@endsection

<!-- //===========BOX  FOOTER ===========   -->
@section('boxfooter')
        
        <div class="col-sm-2">
        </div>

@endsection

<!-- //===========SCRIPT FOR THE FOOTER  ===========   -->
@section('footer-code')
    
@endsection
