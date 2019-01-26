
<!-- // konfigurasi -->

@extends('master.layout')

<!-- //========== SITE TITLE ======== -->
@section('pagename', ' Backup Database')

<!-- //========== MODUL HEADER ========== -->
@section('modulname', 'Backup Database')

@section('modulsection', '')
@section('modulicon', 'fa fa-trash')

<!-- //===========BOX  HEADER =========== -->
@section('boxheader-title', ' Backup Database')

@section('boxheader-instruction', ' Backup Database')

<!-- //===========BOX MESSAGE, for ANY ALERT AVAILABLE =========== -->
@section('boxmessage')

    <!--//ambil dari file untuk formatnya   -->
    @include('master/general/boxmessage')
    
@endsection


<!-- //========== BOX CONTENT =========== -->
@section('boxcontent')
   

    BACKUP DATABASE 


    
@endsection

<!-- //===========BOX  FOOTER ===========   -->
@section('boxfooter')
        

@endsection

<!-- //===========SCRIPT FOR THE FOOTER  ===========   -->
@section('footer-code')
    
@endsection
