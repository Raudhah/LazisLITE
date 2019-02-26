<!-- // pekerjaan laporan -->

@extends('master.layouta4')

<!-- //========== SITE TITLE ======== -->
@section('pagename', 'KUITANSI MASSAL')



<!-- //========== BOX CONTENT =========== -->
@section('boxcontent')


<!-- //========== KUITANSI TRX DONASI =========== -->
<?php 
$counter = 1;
?>

@if ($datadonasi != null)

    @foreach ($datadonasi as $donasi)

    <div class="kuitansi" style="background-image:url('{{asset('storage/'.$konfig->namafilebackground)}}') !important; background-repeat: no-repeat  !important; background-position:top center fixed  !important;background-size:100% !important;" media="print">
        <div class="row" style="">
            <!-- //BAGIAN KIRI -->
            <div class="col-sm-8 kiri" style="">
                <!-- //BARIS KOP /HEADER KUITANSI -->
                <div class="header">
                        <div class="logolaz">
                                <img src="{{asset('storage/'.$konfig->namafilelogo)}}"/>
                        </div>
                        <div class="datalaz" style="text-align:center;">
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
                        <div class="row isikuitansi">
                            <div class="col-sm-12">
                                <h4><strong>Tanda Terima Pembayaran</strong></h4>

                                <table class="table table-striped table-condensed">
                                        <thead>
                                            <tr class="bgblue">
                                                <th style="width:10mm;background-color:#337ab7 !important"  class="bgblue">No.</th>
                                                <th style="width:80mm;background-color:#337ab7 !important"  class="bgblue">Peruntukan Donasi</th>
                                                <th style="width:30mm;background-color:#337ab7 !important"  class="bgblue">Jumlah</th>
                                            </tr>
                                        </thead>
                                    
                                        <tbody>
                                                <?php 
                                                $listtrxdonasidetail = $donasi->trxdonasidetail;
                                                $jumlahtotal = 0;
                                            ?>
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
                                                    <td style="padding:0px;text-align:right"><strong>{{number_format($donasi->jumlahtotal,0,',','.')}}</strong></td>
                                                </tr>
                                                
                                        </tbody>
                                </table>
                                <div style="line-height:14px; font-size:12px; font-style:italic">{{$konfig->tekskuitansi}}</div>
                            </div>
                        </div>

                    </div>

                    <!-- //BAGIAN KANAN -->
                    <div class="col-sm-4 kanan">
                            <table  class="" style="padding:0px;">
                                <tr>
                                    <td><strong>Nomor</strong></td>
                                    <td>: {{config('app.kodekuitansi.trxdonasi')}}{{$donasi->id}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Tanggal</strong></td>
                                    <td>: {{$donasi->tanggaldonasi}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Amil</strong></td>
                                    <td>: ({{config('app.kodeamil')}}{{$donasi->amil->id}}) {{$donasi->amil->namaamil}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Jenis</strong></td>
                                    <td>: Donasi</td>
                                </tr>
                                <tr>
                                    <td style="vertical-align:text-top"><strong>Donatur </strong></td>
                                    <td>
                                        <div style="min-height:20mm;background-color:inherit">
                                                : {{$donasi->donatur->namadonatur}} ({{config('app.kodedonatur')}}{{$donasi->donatur->id}}), {{$donasi->donatur->alamatdonatur}}, {{$donasi->donatur->nomortelepondonatur}},
                                        </div>
                                    </td>
                                </tr>
                            </table>

                            <div class="row" style="height:26mm;">
                                <div class="col-sm-12" style="text-align:center">
                                    <img src="{{asset('storage/'.$konfig->namafilettd)}}" style="max-width:45mm; max-height:23mm"/>
                            
                                </div>
                            </div>
                    </div>
                </div>
                <!-- //END BAGIAN KANAN-->

                <div>
                    <div class="bawahkuitansi" >

                        {{$konfig->nomorrekeningcabang}} 
                        - Sms center : {{$konfig->nomorteleponcabang}} 
                    
                        <div class="garnish"></div>
                        <div class="urlweb">
                            {{($konfig->websitecabang==null? "": "".$konfig->websitecabang)}}
                        </div>
                    </div>
                </div>


        </div>

        <?php 
        if($counter % 4 == 0){
            echo '<div class="pagebreak"> </div>';
        }

        $counter++;
        ?>

    @endforeach

@endif

<!-- //========== KUITANSI KOTAK INFAQ =========== -->
<!-- //========== KUITANSI KOTAK INFAQ =========== -->
<!-- //========== KUITANSI KOTAK INFAQ =========== -->

@if ($datakotakinfaq != null)
    @foreach ($datakotakinfaq as $kotakinfaq)
    <div class="kuitansi" style="background-image:url('{{asset('storage/'.$konfig->namafilebackground)}}') !important; background-repeat: no-repeat  !important; background-position:top center fixed  !important;background-size:100% !important;" media="print">
        <div class="row" style="">
            <!-- //BAGIAN KIRI -->
            <div class="col-sm-8 kiri" style="">
                <!-- //BARIS KOP /HEADER KUITANSI -->
                <div class="header">
                        <div class="logolaz">
                                <img src="{{asset('storage/'.$konfig->namafilelogo)}}"/>
                        </div>
                        <div class="datalaz" style="text-align:center;">
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
                <div class="row isikuitansi">
                    <div class="col-sm-12">
                        <h4><strong>Tanda Terima Kotak Infaq</strong></h4>

                        <table class="table table-striped table-condensed" style="margin-left:2mm;margin-bottom:0px;font-size: 14px">
                                <thead>
                                    <tr class="">
                                        <td>
                                            Alhamdulillah, telah diterima dari hasil perolehan Kotak Infaq Pada Tanggal {{$kotakinfaq->tanggaldonasi}} Kotak Infaq
                                            Sebesar <strong>Rp.{{number_format($kotakinfaq->jumlahtotal,0,',','.')}},00</strong>
                                            @if ($kotakinfaq->keterangan!=null)
                                                ( {{$kotakinfaq->keterangan}} )
                                            @endif
                                        </td>
                                    </tr>
                                </thead>
                            
                                
                        </table>
                        <div style="line-height:14px; font-size:12px; font-style:italic">{{$konfig->tekskuitansi}}</div>
                    </div>
                </div>

            </div>


            <!-- //BAGIAN KANAN -->
            <div class="col-sm-4 kanan">
                    <table  class="" style="padding:0px;">
                        <tr>
                            <td><strong>Nomor</strong></td>
                            <td>: {{config('app.kodekuitansi.trxkotakinfaq')}}{{$kotakinfaq->id}}</td>
                        </tr>
                        <tr>
                            <td><strong>Tanggal</strong></td>
                            <td>: {{$kotakinfaq->tanggaldonasi}}</td>
                        </tr>
                        <tr>
                            <td><strong>Amil</strong></td>
                            <td>: ({{config('app.kodeamil')}}{{$kotakinfaq->amil->id}}) {{$kotakinfaq->amil->namaamil}}</td>
                        </tr>
                        <tr>
                            <td><strong>Jenis</strong></td>
                            <td>: Kotak Infaq</td>
                        </tr>
                        <tr>
                            <td style="vertical-align:text-top"><strong>Donatur </strong></td>
                            <td>
                                <div style="min-height:23mm;background-color:inherit">
                                        : {{$kotakinfaq->donatur->namadonatur}} ({{config('app.kodedonatur')}}{{$kotakinfaq->donatur->id}}), {{$kotakinfaq->donatur->alamatdonatur}}, {{$kotakinfaq->donatur->nomortelepondonatur}},
                                </div>
                            </td>
                        </tr>
                    </table>

                    <div class="row" style="height:26mm;">
                        <div class="col-sm-12" style="text-align:center">
                            <img src="{{asset('storage/'.$konfig->namafilettd)}}" style="max-width:45mm; max-height:23mm"/>
                    
                        </div>
                    </div>
            </div>
        </div>
        <!-- //END BAGIAN KANAN-->

        <div>
                <div class="bawahkuitansi" >

                        {{$konfig->nomorrekeningcabang}} 
                        - Sms center : {{$konfig->nomorteleponcabang}} 
                    
                        <div class="garnish"></div>
                        <div class="urlweb">
                            {{($konfig->websitecabang==null? "": "".$konfig->websitecabang)}}
                        </div>
                </div>
        </div>


    </div>

        <?php 
        if($counter % 4 == 0){
            echo '<div class="pagebreak"> </div>';
        }

            $counter++;
        ?>

    @endforeach
@endif

<!-- //========== KUITANSI IBRANKASKU =========== -->
<!-- //========== KUITANSI IBRANKASKU =========== -->
<!-- //========== KUITANSI IBRANKASKU =========== -->

@if ($dataibrankasku != null)
    @foreach ($dataibrankasku as $ibrankasku)

    <div class="kuitansi" style="background-image:url('{{asset('storage/'.$konfig->namafilebackground)}}') !important; background-repeat: no-repeat  !important; background-position:top center fixed  !important;background-size:100% !important;" media="print">
        <div class="row" style="">
            <!-- //BAGIAN KIRI -->
            <div class="col-sm-8 kiri" style="">
                <!-- //BARIS KOP /HEADER KUITANSI -->
                <div class="header">
                        <div class="logolaz">
                                <img src="{{asset('storage/'.$konfig->namafilelogo)}}"/>
                        </div>
                        <div class="datalaz" style="text-align:center;">
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
                        <div class="row isikuitansi">
                            <div class="col-sm-12">
                                <h4><strong>Tanda Terima Donasi Barang (iBrankasku)</strong></h4>

                                <table class="table table-striped table-condensed" style="margin-left:2mm;margin-bottom:0px;font-size: 14px">
                                        <thead>
                                            <tr class="">
                                                <td>
                                                        Alhamdulillah, telah diterima Pada Tanggal {{$ibrankasku->tanggaldonasi}}  <br/>
                                                        Donasi berupa <strong>{{$ibrankasku->deskripsibarang}}</strong>
                                                </td>
                                            </tr>
                                        </thead>
                                    
                                        
                                </table>
                                <div style="line-height:14px; font-size:12px; font-style:italic">{{$konfig->tekskuitansi}}</div>
                            </div>
                        </div>

                    </div>

                    <!-- //BAGIAN KANAN -->
                    <div class="col-sm-4 kanan">
                            <table  class="" style="padding:0px;">
                                <tr>
                                    <td><strong>Nomor</strong></td>
                                    <td>: {{config('app.kodekuitansi.trxibrankasku')}}{{$ibrankasku->id}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Tanggal</strong></td>
                                    <td>: {{$ibrankasku->tanggaldonasi}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Amil</strong></td>
                                    <td>: ({{config('app.kodeamil')}}{{$ibrankasku->amil->id}}) {{$ibrankasku->amil->namaamil}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Jenis</strong></td>
                                    <td>: iBrankasku</td>
                                </tr>
                                <tr>
                                    <td style="vertical-align:text-top"><strong>Donatur </strong></td>
                                    <td>
                                        <div style="min-height:23mm;background-color:inherit">
                                                : {{$ibrankasku->donatur->namadonatur}} ({{config('app.kodedonatur')}}{{$ibrankasku->donatur->id}}), {{$ibrankasku->donatur->alamatdonatur}}, {{$ibrankasku->donatur->nomortelepondonatur}},
                                        </div>
                                    </td>
                                </tr>
                            </table>

                            <div class="row" style="height:26mm;">
                                <div class="col-sm-12" style="text-align:center">
                                    <img src="{{asset('storage/'.$konfig->namafilettd)}}" style="max-width:45mm; max-height:23mm"/>
                            
                                </div>
                            </div>
                    </div>
                </div>
                <!-- //END BAGIAN KANAN-->

                <div>
                        <div class="bawahkuitansi" >

                                {{$konfig->nomorrekeningcabang}} 
                                - Sms center : {{$konfig->nomorteleponcabang}} 
                            
                                <div class="garnish"></div>
                                <div class="urlweb">
                                    {{($konfig->websitecabang==null? "": "".$konfig->websitecabang)}}
                                </div>
                        </div>
                    
                </div>
        </div>

        <?php 
        if($counter % 4 == 0){
            echo '<div class="pagebreak"> </div>';
        }

        $counter++;
        ?>
    @endforeach
@endif

@endsection

<!-- //===========SCRIPT FOR THE FOOTER  ===========   -->
@section('footer-code')
    
@endsection
