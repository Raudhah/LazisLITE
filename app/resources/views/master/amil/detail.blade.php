
<!-- // amil -->

@extends('master.layout')

<!-- //========== SITE TITLE ======== -->
@section('pagename', 'Detail Amil')

<!-- //========== MODUL HEADER ========== -->
@section('modulname', 'Amil')

@section('modulsection', 'Detail')
@section('modulicon', 'fa fa-trash')

<!-- //===========BOX  HEADER =========== -->
@section('boxheader-title', 'Detail Amil')

@section('boxheader-instruction', 'Detail dari data Amil')

<!-- //===========BOX MESSAGE, for ANY ALERT AVAILABLE =========== -->
@section('boxmessage')

    <!--//ambil dari file untuk formatnya   -->
    @include('master/general/boxmessage')
    
@endsection


<!-- //========== BOX CONTENT =========== -->
@section('boxcontent')
   

        <table class="table table-striped">
            <thead>
                <tr>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Nama Amil</th>
                    <td>{{$data->namaamil}}</td>
                </tr>

                <tr>
                    <th>Alamat Amil</th>
                    <td>{{$data->alamatamil}}</td>
                </tr>

                <tr>
                    <th>Nomor Telepon Amil</th>
                    <td>{{$data->nomorteleponamil}}</td>
                </tr>
                

                <tr>
                    <th>Status</th>
                    <td>
                        @if ($data->statusaktif)
                            Aktif
                        @else
                            Non-Aktif
                        @endif
    
                    </td>
                </tr>
            </tbody>
        </table>

@endsection

<!-- //===========BOX  FOOTER ===========   -->
@section('boxfooter')
        
        <div class="col-sm-2">
        </div>

@endsection

<!-- //===========SCRIPT FOR THE FOOTER  ===========   -->
@section('footer-code')
    
@endsection
