

<!-- // trxdonasi -->

@extends('master.layoutkuitansi')

<!-- //========== SITE TITLE ======== -->
@section('pagename', 'Cetak Kuitansi')

    @section('kuitansi')

    <div class="kuitansi" style="min-height: 75mm; max-width:210mm;margin-left:10mm;border: 1px solid green;margin-bottom: 2mm;line-height: 16px;background:url('{{asset('storage/'.$konfig->namafilebackground)}}') no-repeat top center fixed;background-size:cover;">
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
                        <h4 style="margin:0px"><strong>Tanda Terima Kotak Infaq</strong></h4>

                        <table class="table table-striped table-condensed" style="margin-left:2mm;margin-bottom:0px;font-size: 14px">
                                <thead>
                                    <tr class="">
                                        <td>
                                            Alhamdulillah, telah diterima dari hasil perolehan Kotak Infaq Pada Tanggal {{$tanggaldonasi}} Kotak Infaq
                                            Sebesar <strong>Rp.{{number_format($jumlahtotal,0,',','.')}},00</strong>
                                            @if ($keterangan!=null)
                                                    ( {{$keterangan}} )
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

        <section class="invoice no-print">
                <!-- this row will not appear when printing -->
                <div class="row no-print">
                  <div class="col-xs-12">
                    <a href="{{url('')}}/trxkotakinfaq/{{$idtransaksi}}/print" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Cetak Kuitansi</a>
                    </a>
                    <button type="button" class="btn hidden btn-primary pull-right" style="margin-right: 5px;">
                      <i class="fa fa-download"></i> Download PDF
                    </button>
                  </div>
                </div>
            </section>

</div>
        
    @endsection

<!-- //===========SCRIPT FOR THE FOOTER  ===========   -->
@section('footer-code')
    
@endsection


