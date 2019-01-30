<!-- // pekerjaan laporan -->

@extends('master.layouta4')

<!-- //========== SITE TITLE ======== -->
@section('pagename', 'Laporan Semua Transaksi')



<!-- //========== BOX CONTENT =========== -->
@section('boxcontent')
    <div class="kuitansi" style="min-height: 75mm;border: 1px solid green;margin-bottom: 2mm;line-height: 16px;background:url('{{asset('storage/'.$konfig->namafilebackground)}}') no-repeat top center fixed;background-size:cover;">
            <div class="row" style="">
                <!-- //BAGIAN KIRI -->
                <div class="col-sm-8">
                    <!-- //BARIS KOP /HEADER KUITANSI -->
                    <div class="row">
                            <div class="col-sm-3" style="text-align:right">
                                    <img src="{{asset('storage/'.$konfig->namafilelogo)}}" style="height:22mm"/>
                            </div>
                            <div class="col-sm-9" style="text-align:center;">
                                    <strong>{{$konfig->namalaz}} {{$konfig->namacabang}}</strong>
                                    <br/>

                                    <small> 
                                        <?php
                                        echo nl2br($konfig->keterangan);
                                        ?>
                                        <br/><em>{{$konfig->alamatcabang}}</em>
                                    </small>
                            </div>
                    </div>

                    <!-- //HALAMAN UTAMA DETAIL KUITANSI ADA DISINI -->
                    <div class="row">
                        <div class="col-sm-12" style="text-align:center">
                            <h4 style="margin:0px"><strong>Tanda Terima Pembayaran</strong></h4>

                            <table class="table table-striped table-condensed" style="margin-left:2mm;margin-bottom:0px;font-size: 14px">
                                    <thead>
                                        <tr class="bg-primary">
                                            <th style="padding:0px;width:10mm;text-align:center">No.</th>
                                            <th style="padding:0px;width:80mm;text-align:center">Peruntukan Donasi</th>
                                            <th style="padding:0px;width:30mm;text-align:center">Jumlah</th>
                                        </tr>
                                    </thead>
                                
                                    <tbody>
                                        <!- // PERINCIANNYA-->
                                        @foreach ($listtrxdonasidetail as $key=>$trxdonasidetail)
                                            
                                            <tr>
                                                <td style="padding:0px;text-align:center">{{++$key}}</td>
                                                <td style="padding:0px;text-align:left">{{$trxdonasidetail->peruntukandonasi->namaperuntukandonasi}}</td>
                                                <td style="padding:0px;text-align:right">{{number_format($trxdonasidetail->jumlah,0,',','.')}}</td>
                                            </tr>
                                        @endforeach
                                            
                                        <!- // JUMLAH TOTALNYA-->
                                            <tr style="" class="bg-gray">
                                                <td style="padding:0px;" class=""></td>
                                                <td style="padding:0px;" class=""><strong> JUMLAH TOTAL</strong></td>
                                                <td style="padding:0px;text-align:right"><strong>{{number_format($jumlahtotal,0,',','.')}}</strong></td>
                                            </tr>
                                            
                                    </tbody>
                            </table>
                            <div style="line-height:14px; font-size:12px; font-style:italic">{{$konfig->tekskuitansi}}</div>
                        </div>
                    </div>

                </div>

                <!-- //BAGIAN KANAN -->
                <div class="col-sm-4">
                        <table style="border:0px solid black">
                            <tr>
                                <td><strong>Nomor</strong></td>
                                <td>: {{config('app.kodekuitansi.trxdonasi')}}{{$idtransaksi}}</td>
                            </tr>
                            <tr>
                                <td><strong>Tanggal</strong></td>
                                <td>: {{$tanggaldonasi}}</td>
                            </tr>
                            <tr>
                                <td><strong>Amil</strong></td>
                                <td>: ({{config('app.kodeamil')}}{{$dataamil->id}}) {{$dataamil->namaamil}}</td>
                            </tr>
                            <tr>
                                <td><strong>Jenis</strong></td>
                                <td>: Donasi</td>
                            </tr>
                            <tr>
                                <td style="vertical-align:text-top"><strong>Donatur </strong></td>
                                <td>
                                    <div style="min-height:23mm;background-color:inherit">
                                            : {{$datadonatur->namadonatur}} ({{config('app.kodedonatur')}}{{$datadonatur->id}}), {{$datadonatur->alamatdonatur}}, {{$datadonatur->nomortelepondonatur}},
                                    </div>
                                </td>
                            </tr>
                        </table>

                        <div class="row" style="height:30mm">
                            <div class="col-sm-12" style="text-align:center">
                                <img src="{{asset('storage/'.$konfig->namafilettd)}}" style="max-width:45mm; max-height:25mm"/>
                        
                            </div>
                        </div>
                </div>
            </div>
            <!-- //END BAGIAN KANAN-->

            <div>
                <div style="text-align:center; font-size:12px; font-weight:bold; font-style:italic; background-color:orange; overflow:hidden">
                    {{$konfig->nomorrekeningcabang}} 
                    <br/> Telepon : {{$konfig->nomorteleponcabang}} 
                    {{($konfig->emailcabang==null? "": "Email : ".$konfig->emailcabang)}} 
                    {{($konfig->websitecabang==null? "": "Website : ".$konfig->websitecabang)}} 
                </div>
            </div>


    </div>
 
@endsection

<!-- //===========SCRIPT FOR THE FOOTER  ===========   -->
@section('footer-code')
    
@endsection
