@include('master/commonfunction');


<!-- // pekerjaan laporan -->

@extends('master.layouta4')

<!-- //========== SITE TITLE ======== -->
@section('pagename', 'KUITANSI')



<!-- //========== BOX CONTENT =========== -->
@section('boxcontent')


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
                                                <td style="padding:0px;background-color:#d2d6de !important" class=""></td>
                                                <td style="padding:0px;background-color:#d2d6de !important" class=""><strong> JUMLAH TOTAL</strong></td>
                                                <td style="padding:0px;text-align:right;background-color:#d2d6de !important"><strong>{{number_format($jumlahtotal,0,',','.')}}</strong></td>
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
                                <td>: {{config('app.kodekuitansi.trxdonasi')}}{{$idtransaksi}}</td>
                            </tr>
                            {{printtanggal($tanggaldonasi, $formattanggal)}}
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
                                    <div style="min-height:20mm;background-color:inherit">
                                            : {{$datadonatur->namadonatur}} ({{config('app.kodedonatur')}}{{$datadonatur->id}}), {{$datadonatur->alamatdonatur}}, {{$datadonatur->nomortelepondonatur}},
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

    <div class="pagebreak"> </div>

    
 
@endsection

<!-- //===========SCRIPT FOR THE FOOTER  ===========   -->
@section('footer-code')
<script>
    $(document).ready(function(){
        window.print();
    });
</script>
@endsection
