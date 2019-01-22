

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
    Kuitansi Nomor : IBRK-{{$idtransaksi}}
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
            Alhamdulillah, telah diterima Pada Tanggal {{$tanggaldonasi}}  <br/>
            Donasi berupa <strong>{{$deskripsibarang}}</strong>
            <small><em>Semoga ALLAH memberi pahala atas apa yang Anda berikan, <br/> memberikan barokah atas apa yang masih di tangan Anda, <br/> dan menjadikannya sebagai pembersih Anda</em></small>
        </blockquote>

@endsection

<!-- //========== NOMOR KUITANSI ======== -->
@section('kolombawahkiri')
    
    
    <br/>
@endsection

@section('kolombawahkanan')
    TANDA TANGAN DISINI
@endsection


<!-- //===========SCRIPT FOR THE FOOTER  ===========   -->
@section('footer-code')
    
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
                    <th>Deskripsi Barang</th>
                    <td>{{$deskripsibarang}}</td>
                </tr>

                <tr>
                    <th>Nominal Valuasi</th>
                    <td>{{number_format($nominalvaluasi,0,',','.')}}</td>
                </tr>
                
                <tr>
                    <th>Peruntukan Donasi</th>
                    <td><a class="btn btn-primary" href="#">{{$dataperuntukandonasi->namaperuntukandonasi}}</a></td>
                </tr>
                

            </tbody>
        </table>

@endsection

<!-- //===========BOX  FOOTER ===========   -->
@section('boxfooter')
        
        <div class="col-sm-2">
        </div>

        <div class="col-sm-10">
            <a class="btn btn-warning" href="/trxibrankasku/{{$idtransaksi}}/edit">Edit</a>
            <a class="btn btn-danger" href="/trxibrankasku/{{$idtransaksi}}/delete">Hapus</a>
        </div>
    

@endsection

<!-- //===========SCRIPT FOR THE FOOTER  ===========   -->
@section('footer-code')
    
@endsection
