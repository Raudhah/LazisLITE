
<!-- // trxkotakinfaq -->

@extends('master.layout')

<!-- //========== SITE TITLE ======== -->
@section('pagename', 'HAPUS Transaksi Kotak Infaq')

<!-- //========== MODUL HEADER ========== -->
@section('modulname', 'Kotak Infaq')

@section('modulsection', 'HAPUS')
@section('modulicon', 'fa fa-trash')

<!-- //===========BOX  HEADER =========== -->
@section('boxheader-title', 'HAPUS Kotak Infaq')

@section('boxheader-instruction', 'Apakah Yakin Anda Mau Menghapus Data Berikut?')

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
                    <td><a class="btn btn-success" href="/amil/{{$dataamil->id}}">{{$dataamil->namaamil}}</a></td>
                </tr>

                
                <tr>
                    <th>Tanggal Donasi</th>
                    <td>{{$tanggaldonasi}}</td>
                </tr>

                <tr>
                    <th>Keterangan</th>
                    <td><div>{{$keterangan}}</div></td>
                </tr>

                <tr>
                    <th>Jumlah Total</th>
                    <td>{{number_format($jumlahtotal,0,',','.')}}</td>
                </tr>
                
 
            </tbody>
        </table>

@endsection

<!-- //===========BOX  FOOTER ===========   -->
@section('boxfooter')
        
        <div class="col-sm-2">
        </div>

        <div class="col-sm-10">

            <!-- form start -->
            <form class="form-horizontal" method="POST" action="/trxkotakinfaq/{{$idtransaksi}}">
                
                {{@csrf_field()}}
                {{method_field('DELETE')}}
                    
                <button type="submit" class="btn btn-danger">Hapus</button>

            </form>
        </div>
    

@endsection

<!-- //===========SCRIPT FOR THE FOOTER  ===========   -->
@section('footer-code')
    
@endsection
