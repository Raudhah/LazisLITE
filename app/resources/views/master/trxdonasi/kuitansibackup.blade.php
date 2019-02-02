
<!-- // trxdonasi -->

@extends('master.layout')

<!-- //========== SITE TITLE ======== -->
@section('pagename', 'Detail Donasi')

<!-- //========== MODUL HEADER ========== -->
@section('modulname', 'Donasi')

@section('modulsection', 'Detail')
@section('modulicon', 'fa fa-edit')

<!-- //===========BOX  HEADER =========== -->
@section('boxheader-title', 'Detail Donasi')

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
                    <td><a class="btn btn-success" href="{{url('')}}/amil/{{$dataamil->id}}">{{$dataamil->namaamil}}</a></td>
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
            <a class="btn btn-warning" href="{{url('')}}/trxdonasi/{{$idtransaksi}}/edit">Edit</a>
            <a class="btn btn-danger" href="{{url('')}}/trxdonasi/{{$idtransaksi}}/delete">Hapus</a>
        </div>
    

@endsection

<!-- //===========SCRIPT FOR THE FOOTER  ===========   -->
@section('footer-code')
    
@endsection
