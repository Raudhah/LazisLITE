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

        <!-- //========== TRXDONASI TRXDONASI TRXDONASI TRXDONASI TRXDONASI TRXDONASI TRXDONASI TRXDONASI===========-->
        <!-- //========== JIKA OPSI TRANSAKSI DONASI AKTIF ========== -->
        @if (sizeof($datadonasi)>0)
            <h2>Transaksi Donasi dan iBrankasku</h2>

            <!-- //========== LOOPING UNTUK SETIAP TRANSAKSI DONASI ========== -->
           

                <h3>{{($peruntukandonasi->statusaktif == 1? "":"(TIDAK AKTIF) :: ")}}{{$peruntukandonasi->namaperuntukandonasi}}</h3>

                <table class="table table-striped table-bordered table-condensed">
                    <thead class="bg-blue">
                        <tr>
                            <th style="text-align:center;width:30px">No.</th>
                            <th style="text-align:center;width:75px">Tanggal</th>
                            <th style="text-align:center;width:150px">Amil</th>
                            <th style="text-align:center;width:150px">Donatur</th>
                            <th style="text-align:center;width:300px">Keterangan</th>
                            <th style="text-align:center;width:150px">Total</th>
                        </tr>
                    </thead>
    
    
                    <tbody>
                    
                    <?php 
                        $total = 0;
                    ?>

                @foreach ($datadonasi as $keydonasi=>$donasi)
                    @foreach ($donasi->trxdonasidetail as $key=>$item)

                            <tr>
                                <td style="text-align:center"><a href="{{url('')}}/trxdonasi/{{$donasi->id}}" target="_blank">({{config('app.kodekuitansi.trxdonasi')}}-{{$donasi->id}})</td>
                                <td style="text-align:center">{{$donasi->tanggaldonasi}}</td>
                                <td>({{config('app.kodeamil')}}{{$donasi->amil_id}}) {{$donasi->amil->namaamil}}</td>
                                <td>({{config('app.kodedonatur')}}{{$donasi->donatur_id}}) {{$donasi->donatur->namadonatur}}</td>
                                <td>{{$donasi->keterangan}}</td>
                                <td style="text-align:right">{{number_format($item->jumlah,0,',','.')}}</td>
                            </tr>  
                            
                            <?php
                            //hitung totalnya 
                            $total = $total + $item->jumlah;
                            ?>
                            
                    @endforeach
                @endforeach   
                
            
                
                @foreach ($dataibrankasku as $itemtrx)
                      \                            
                            <tr>
                                <td style="text-align:center"><a href="{{url('')}}/trxibrankasku/{{$itemtrx->id}}" target="_blank">({{config('app.kodekuitansi.trxibrankasku')}}-{{$itemtrx->id}})</td>
                                <td style="text-align:center">{{$itemtrx->tanggaldonasi}}</td>
                                <td>({{config('app.kodeamil')}}{{$itemtrx->amil_id}}) {{$itemtrx->amil->namaamil}}</td>
                                <td>({{config('app.kodedonatur')}}{{$itemtrx->donatur_id}}) {{$itemtrx->donatur->namadonatur}}</td>
                                <td>{{$itemtrx->deskripsibarang}}</td>
                                <td style="text-align:right">{{number_format($itemtrx->nominalvaluasi,0,',','.')}}</td>
                            </tr>  
                            
                            <?php
                            //hitung totalnya 
                            $total = $total + $itemtrx->nominalvaluasi;
                            ?>
                            
                        @endif
                @endforeach   
                
                        <tr class="bg-blue">
                            <td></td>
                            <td colspan="4" style="text-align:center"> <strong> TOTAL </strong> </td>
                            <td style="text-align:right">{{number_format($total,0,',','.')}}</td>
                        </tr>  
                
                    </tbody>
                </table>
                <hr/>

            @endforeach





@endsection

<!-- //===========SCRIPT FOR THE FOOTER  ===========   -->
@section('footer-code')
    
@endsection
