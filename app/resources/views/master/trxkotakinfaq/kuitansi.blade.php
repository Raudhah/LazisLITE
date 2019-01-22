

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
    Kuitansi Nomor : INFQ-{{$idtransaksi}}
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
                        <th>Petugas AMIL</th>
                        <td><a href="/amil/{{$dataamil->id}}">{{$dataamil->namaamil}}</a></td>
                    </tr>
        
                    
                    <tr>
                        <th>Tanggal </th>
                        <td>{{$tanggaldonasi}}</td>
                    </tr>
        
        </tbody>

    </table>


@endsection

<!-- //========== RINCIAN KUITANSI ======== -->
@section('rinciankuitansi')

        <blockquote>
            Alhamdulillah, telah diterima dari hasil perolehan Kotak Infaq Pada Tanggal {{$tanggaldonasi}} Kotak Infaq
            Sebesar <strong>Rp.{{number_format($jumlahtotal,0,',','.')}},00</strong>
            <small><em>Semoga ALLAH memberi pahala atas apa yang Anda berikan, <br/> memberikan barokah atas apa yang masih di tangan Anda, <br/> dan menjadikannya sebagai pembersih Anda</em></small>
        </blockquote>

@endsection

<!-- //========== NOMOR KUITANSI ======== -->
@section('kolombawahkiri')
    
    
    <div class="bg-gray">
        Keterangan : 
        {{$keterangan}}
        <br/>
        
    </div>

    <br/>
    <br/>
@endsection

@section('kolombawahkanan')
    TANDA TANGAN DISINI
@endsection


<!-- //===========SCRIPT FOR THE FOOTER  ===========   -->
@section('footer-code')
    
@endsection


