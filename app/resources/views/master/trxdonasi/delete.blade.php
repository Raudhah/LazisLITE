
<!-- // trxdonasi -->

@extends('master.layout')

<!-- //========== SITE TITLE ======== -->
@section('pagename', 'HAPUS Transaksi donasi')

<!-- //========== MODUL HEADER ========== -->
@section('modulname', 'donasi')

@section('modulsection', 'HAPUS')
@section('modulicon', 'fa fa-trash')

<!-- //===========BOX  HEADER =========== -->
@section('boxheader-title', 'HAPUS Transaksi Donasi')

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
                <th>Nomor Telepon Donatur</th>
                <td>{{$datadonatur->nomortelepondonatur}}</td>
            </tr>

            <tr>
                <th>Jenis Donasi</th>
                <td>
                    {{($insidentil==0 ? "Donasi Rutin":"Donasi Insidentil")}}
                </td>
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
                <td>{{$keterangan}}</td>
            </tr>

            <tr>
                <th>Rincian Donasi</th>
                <td>
                        <table class="table table-striped">
                                <tbody>
                    
                                    <!- // PERINCIANNYA-->
                                    @foreach ($listtrxdonasidetail as $key=>$trxdonasidetail)
                                        
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>{{$trxdonasidetail->peruntukandonasi->namaperuntukandonasi}}</td>
                                            <td class="pull-right">{{number_format($trxdonasidetail->jumlah,0,',','.')}}</td>
                                        </tr>
                                    @endforeach
                                        
                                    <!- // JUMLAH TOTALNYA-->
                                        <tr>
                                            <td class="bg-orange"></td>
                                            <td class="bg-orange">JUMLAH TOTAL</td>
                                            <td class="pull-right"><strong>{{number_format($jumlahtotal,0,',','.')}}</strong></td>
                                        </tr>
                                      
                                </tbody>
                    
                        </table>

                </td>
                
            </tr>
                            

        </tbody>
    </table>

    <hr/>



@endsection

<!-- //===========BOX  FOOTER ===========   -->
@section('boxfooter')
        
        <div class="col-sm-2">
        </div>

        <div class="col-sm-10">

            <!-- form start -->
            <form class="form-horizontal" method="POST" action="/trxdonasi/{{$idtransaksi}}">
                
                {{@csrf_field()}}
                {{method_field('DELETE')}}
                    
                <button type="submit" class="btn btn-danger btn-lg"> YA, Hapus</button>

            </form>
        </div>
    

@endsection

<!-- //===========SCRIPT FOR THE FOOTER  ===========   -->
@section('footer-code')
    
@endsection
