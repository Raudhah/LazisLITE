<!-- // pekerjaan laporan -->

@extends('master.layoutblank')

<!-- //========== SITE TITLE ======== -->
@section('pagename', 'Laporan Per-Peruntukan Donasi')


<!-- //========== BOX CONTENT =========== -->
@section('boxcontent')

<div style="text-align:center"> 
    @if ($donatur_id == -1)
        <h1>Laporan Semua Transaksi</h1>
        <h4>Periode Laporan : {{$periodelaporan}}</h4>
    @endif
    @if ($donatur_id != -1)
        <h1>Laporan Data Transaksi Untuk Donatur ({{config('app.kodedonatur').$datadonatur->id}}) {{$datadonatur->namadonatur}}</h1>
        <h4>Periode Laporan : {{$periodelaporan}}</h4>
    @endif

        
</div>
        <?php 
            $totaltrxdonasi = 0;
            $totaltrxkotakinfaq = 0;
            $totaltrxibrankasku = 0;
            $totalsemua = 0;
        ?>

        <!-- //========== TRXDONASI TRXDONASI TRXDONASI TRXDONASI TRXDONASI TRXDONASI TRXDONASI TRXDONASI===========-->
        <!-- //========== JIKA OPSI TRANSAKSI DONASI AKTIF ========== -->
        @if (sizeof($datadonasi)>0)
            <h2>Transaksi Donasi</h2>

            <!-- //========== LOOPING UNTUK SETIAP TRANSAKSI DONASI ========== -->
           
                <table class="table table-striped table-bordered table-condensed">
                    <thead class="bg-blue">
                        <tr>
                            <th style="text-align:center;width:30px">No.</th>
                            <th style="text-align:center;width:30px">Kuitansi</th>
                            <th style="text-align:center;width:75px">Tanggal</th>
                            <th style="text-align:center;width:150px">Amil</th>
                            <th style="text-align:center;width:150px">Keterangan</th>
                            <th style="text-align:center;width:250px">Detail</th>
                            <th style="text-align:center;width:150px">Total</th>
                        </tr>
                    </thead>
    
    
                    <tbody>
                    
                    

                @foreach ($datadonasi as $keydonasi=>$donasi)

                <tr>
                        <td style="text-align:center">{{++$keydonasi}}</td>
                        <td style="text-align:center"><a href="{{url('')}}/trxdonasi/{{$donasi->id}}" target="_blank">({{config('app.kodekuitansi.trxdonasi')}}-{{$donasi->id}})</td>
                        <td style="text-align:center">{{$donasi->tanggaldonasi}}</td>
                        <td>({{config('app.kodeamil')}}{{$donasi->amil_id}}) {{$donasi->amil->namaamil}}</td>
                        <td>{{$donasi->keterangan}}</td>
                        <!-- //RINCIAN DETAIL DONASINYA-->
                        <td>
                            <table class="table table-condensed" style="margin-bottom:0px">
                            <?php 
                                $total = 0;
                            ?>

                            @foreach ($donasi->trxdonasidetail as $key=>$item)
                                <tr>
                            
                                    <td>{{$item->peruntukandonasi->namaperuntukandonasi}}</td>
                                    <td style="text-align:right">{{number_format($item->jumlah,0,',','.')}}</td>
                                    <td></td>
                                
                                </tr>
                                <?php
                                //hitung totalnya 
                                $total = $total + $item->jumlah;
                                ?>
                                
                            @endforeach
                            </table>
                        </td>

                        <td style="text-align:right">{{number_format($total,0,',','.')}}</td>

                        <?php 
                            $totaltrxdonasi += $total;
                        ?>
                    </tr>
                @endforeach   

                <tr class="bg-blue">
                        <td></td>
                        <td colspan="5" style="text-align:center"> <strong> TOTAL </strong> </td>
                        <td style="text-align:right">{{number_format($totaltrxdonasi,0,',','.')}}</td>
                </tr>
                
                <?php 
                    $totalsemua += $totaltrxdonasi;
                ?>
            
                </tbody>
            </table>
            <hr/>
                
        @endif 

  
        <!-- //========== TRXIBRANKASKU TRXIBRANKASKU TRXIBRANKASKU TRXIBRANKASKU TRXIBRANKASKU TRXIBRANKASKU TRXIBRANKASKU TRXIBRANKASKU===========-->
        <!-- //========== JIKA OPSI TRANSAKSI IBRANKASKU AKTIF ========== -->
        @if (sizeof($dataibrankasku)>0)
            <h2>Transaksi iBrankasku</h2>

            <!-- //========== LOOPING UNTUK SETIAP TRANSAKSI IBRANKASKU ========== -->
        
                <table class="table table-striped table-bordered table-condensed">
                    <thead class="bg-blue">
                        <tr>
                            <th style="text-align:center;width:30px">No.</th>
                            <th style="text-align:center;width:30px">Kuitansi.</th>
                            <th style="text-align:center;width:75px">Tanggal</th>
                            <th style="text-align:center;width:150px">Amil</th>
                            <th style="text-align:center;width:150px">Peruntukan Donasi</th>
                            <th style="text-align:center;width:250px">deskripsibarang</th>
                            <th style="text-align:center;width:150px">Nominal Valuasi</th>
                        </tr>
                    </thead>


                    <tbody>
                    
                    
        
                
            @foreach ($dataibrankasku as $nomor=>$itemtrx)

                        <?php $total=0; ?>
                                                
                        <tr>
                            <td style="text-align:right">{{++$nomor}}</td>
                            <td style="text-align:center"><a href="{{url('')}}/trxibrankasku/{{$itemtrx->id}}" target="_blank">({{config('app.kodekuitansi.trxibrankasku')}}-{{$itemtrx->id}})</td>
                            <td style="text-align:center">{{$itemtrx->tanggaldonasi}}</td>
                            <td>({{config('app.kodeamil')}}{{$itemtrx->amil_id}}) {{$itemtrx->amil->namaamil}}</td>
                            <td>{{$itemtrx->peruntukandonasi->namaperuntukandonasi}}</td>
                            <td>{{$itemtrx->deskripsibarang}}</td>
                            <td style="text-align:right">{{number_format($itemtrx->nominalvaluasi,0,',','.')}}</td>
                        </tr>  
                        
                        <?php
                        //hitung totalnya 
                        $total = $total + $itemtrx->nominalvaluasi;
                        $totaltrxibrankasku += $total;
                        ?>
                        
            @endforeach   
            
                    <tr class="bg-blue">
                        <td></td>
                        <td colspan="5" style="text-align:center"> <strong> TOTAL </strong> </td>
                        <td style="text-align:right">{{number_format($totaltrxibrankasku,0,',','.')}}</td>
                    </tr>  
            
                </tbody>
            </table>
            <hr/>


        @endif

  
        <!-- //========== TRXKOTAKINFAQ TRXKOTAKINFAQ TRXKOTAKINFAQ TRXKOTAKINFAQ TRXKOTAKINFAQ TRXKOTAKINFAQ TRXKOTAKINFAQ TRXKOTAKINFAQ===========-->
        <!-- //========== JIKA OPSI TRANSAKSI KOTAKINFAQ AKTIF ========== -->
        @if (sizeof($datakotakinfaq)>0)
            <h2>Transaksi Kotak Infaq</h2>

            <!-- //========== LOOPING UNTUK SETIAP TRANSAKSI KOTAKINFAQ ========== -->
        
                <table class="table table-striped table-bordered table-condensed">
                    <thead class="bg-blue">
                        <tr>
                            <th style="text-align:center;width:30px">No.</th>
                            <th style="text-align:center;width:30px">Kuitansi.</th>
                            <th style="text-align:center;width:75px">Tanggal</th>
                            <th style="text-align:center;width:150px">Amil</th>
                            <th style="text-align:center;width:250px">keterangan</th>
                            <th style="text-align:center;width:150px">Nominal Valuasi</th>
                        </tr>
                    </thead>


                    <tbody>
                    
                    
        
                
            @foreach ($datakotakinfaq as $nomor=>$itemtrx)

                        <?php $total=0; ?>
                                                
                        <tr>
                            <td style="text-align:right">{{++$nomor}}</td>
                            <td style="text-align:center"><a href="{{url('')}}/trxkotakinfaq/{{$itemtrx->id}}" target="_blank">({{config('app.kodekuitansi.trxkotakinfaq')}}-{{$itemtrx->id}})</td>
                            <td style="text-align:center">{{$itemtrx->tanggaldonasi}}</td>
                            <td>({{config('app.kodeamil')}}{{$itemtrx->amil_id}}) {{$itemtrx->amil->namaamil}}</td>
                            <td>{{$itemtrx->keterangan}}</td>
                            <td style="text-align:right">{{number_format($itemtrx->jumlahtotal,0,',','.')}}</td>
                        </tr>  
                        
                        <?php
                        //hitung totalnya 
                        $total = $total + $itemtrx->jumlahtotal;
                        $totaltrxkotakinfaq += $total;
                        ?>
                        
            @endforeach   
            
                    <tr class="bg-blue">
                        <td></td>
                        <td colspan="4" style="text-align:center"> <strong> TOTAL </strong> </td>
                        <td style="text-align:right">{{number_format($totaltrxkotakinfaq,0,',','.')}}</td>
                    </tr>  
            
                </tbody>
            </table>
            <hr/>


        @endif


        <h2>Rekapitulasi</h2>

            <!-- //========== LOOPING UNTUK SETIAP TRANSAKSI KOTAKINFAQ ========== -->
        
                <table class="table table-striped table-bordered table-condensed" style="width:350px">
                    <thead class="bg-blue">
                        <tr>
                            <th style="text-align:center;width:30px">No.</th>
                            <th style="text-align:center;width:150px">Keterangan</th>
                            <th style="text-align:center;width:150px">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $nomor = 0; ?>
                        @if (sizeof($datadonasi)>0)
                            <tr>
                                <td>{{++$nomor}}</td>
                                <td>Transaksi Donasi</td>
                                <td style="text-align:right">{{number_format($totaltrxdonasi,0,',','.')}}</td>
                            </tr>
                        @endif
                        @if (sizeof($dataibrankasku)>0)
                            <tr>
                                <td>{{++$nomor}}</td>
                                <td>Transaksi iBrankasku</td>
                                <td style="text-align:right">{{number_format($totaltrxibrankasku,0,',','.')}}</td>
                            </tr>
                        @endif
                        @if (sizeof($datakotakinfaq)>0)
                            <tr>
                                <td>{{++$nomor}}</td>
                                <td>Transaksi Kotak Infaq</td>
                                <td style="text-align:right">{{number_format($totaltrxkotakinfaq,0,',','.')}}</td>
                            </tr>
                        @endif

                        <?php 
                            $totalsemua = $totaltrxdonasi + $totaltrxibrankasku + $totaltrxkotakinfaq;
                        ?>

                        <tr class="bg-blue">
                            <td colspan="2" style="text-align:center"><strong>TOTAL SEMUA</strong></td>
                            <td style="text-align:right">{{number_format($totalsemua,0,',','.')}}</td>
                        </tr>
                    </tbody>
                </table>


@endsection

<!-- //===========SCRIPT FOR THE FOOTER  ===========   -->
@section('footer-code')
    
@endsection
