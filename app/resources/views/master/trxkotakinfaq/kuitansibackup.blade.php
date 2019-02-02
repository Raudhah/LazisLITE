
<!-- // trxkotakinfaq -->

@extends('master.layout')

<!-- //========== SITE TITLE ======== -->
@section('pagename', 'Detail Kotak Infaq')

<!-- //========== MODUL HEADER ========== -->
@section('modulname', 'Kotak Infaq')

@section('modulsection', 'Detail')
@section('modulicon', 'fa fa-edit')

<!-- //===========BOX  HEADER =========== -->
@section('boxheader-title', 'Detail Kotak Infaq')

@section('boxheader-instruction', 'silakan Klik Edit / Hapus untuk mengubah Data')

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
                    <th width="30%">KEY</th>
                    <th>VALUE</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Nama Donatur</th>
                    <td>{{$datadonatur->namadonatur}}</td>
                </tr>
                <tr>
                    <th>Almat Donatur</th>
                    <td>{{$datadonatur->alamatdonatur}}</td>
                </tr>
                <tr>
                    <th>Nama Donatur</th>
                    <td>{{$datadonatur->nomortelepondonatur}}</td>
                </tr>
                
                <tr>
                    <th>Petugas AMIL</th>
                    <td><a class="btn btn-success" href="{{url('')}}/amil/{{$dataamil->id}}">{{$dataamil->namaamil}}</a></td>
                </tr>

                
                <tr>
                    <th>Tanggal Donasi</th>
                    <td>{{$tanggaldonasi}}</td>
                </tr>


                <tr>
                    <th>Jumlah Total</th>
                    <td>{{number_format($jumlahtotal,0,',','.')}}</td>
                </tr>


                <tr>
                    <th>Keterangan</th>
                    <td>{{$keterangan}}</td>
                </tr>


            </tbody>
        </table>

@endsection

<!-- //===========BOX  FOOTER ===========   -->
@section('boxfooter')
        
        <div class="col-sm-2">
        </div>

        <div class="col-sm-10">
            <a class="btn btn-warning" href="{{url('')}}/trxkotakinfaq/{{$idtransaksi}}/edit">Edit</a>
            <a class="btn btn-danger" href="{{url('')}}/trxkotakinfaq/{{$idtransaksi}}/delete">Hapus</a>
        </div>
    

@endsection

<!-- //===========SCRIPT FOR THE FOOTER  ===========   -->
@section('footer-code')
    
@endsection
