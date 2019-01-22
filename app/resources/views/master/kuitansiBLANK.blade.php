
<!-- // trxdonasi -->

@extends('master.layoutkuitansi')



<!-- //========== HEADER KUITANSI ======== -->
<!-- //========== logo, alamat, dkk ditaruh disini ya ======== -->
@section('headerkuitansi')
    <i class="fa fa-car"></i>
    
    LazisLITE

@endsection

<!-- //========== NOMOR KUITANSI ======== -->
@section('nomorkuitansi')
    Kuitansi Nomor : DNS-{{$idtransaksi}}
@endsection

<!-- //========== KOLOM KIRI KUITANSI ======== -->
@section('kolomkiri')
    
    <table class="table table-condensed no-border">
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
        </tbody>
    </table>

@endsection

<!-- //========== KOLOM KANAN KUITANSI ======== -->
@section('kolomkanan')
    
    <table class="table table-condensed no-border">
        <tbody>
                <tr>
                        <th>Jenis Donasi</th>
                        <td>
                            {{($insidentil==0 ? "Donasi Rutin":"Donasi Insidentil")}}
                        </td>
                    </tr>
                    
                    <tr>
                        <th>Petugas AMIL</th>
                        <td><a href="/amil/{{$dataamil->id}}">{{$dataamil->namaamil}}</a></td>
                    </tr>
        
                    
                    <tr>
                        <th>Tanggal Donasi</th>
                        <td>{{$tanggaldonasi}}</td>
                    </tr>
        
        </tbody>

    </table>


@endsection

<!-- //========== RINCIAN KUITANSI ======== -->
@section('rinciankuitansi')

            <table class="table table-striped">
                    <thead>
                        <tr class="bg-primary">
                            <th>Nomor</th>
                            <th>Peruntukan Donasi</th>
                            <th class="">Jumlah</th>
                        </tr>
                    </thead>
                
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
                                <td class=""></td>
                                <td class=""><strong> JUMLAH TOTAL</strong></td>
                                <td class="pull-right"><strong>{{number_format($jumlahtotal,0,',','.')}}</strong></td>
                            </tr>
                            
                    </tbody>
        
            </table>

@endsection

<!-- //========== NOMOR KUITANSI ======== -->
@section('kolombawahkiri')
    
    
    <div class="bg-gray">
        Keterangan : 
        {{$keterangan}}
    </div>
    <br/>
@endsection

@section('kolombawahkanan')
    TANDA TANGAN DISINI
@endsection


<!-- //===========SCRIPT FOR THE FOOTER  ===========   -->
@section('footer-code')
    
@endsection
