<!-- // pekerjaan laporan -->

@extends('master.layoutblank')

<!-- //========== SITE TITLE ======== -->
@section('pagename', 'Laporan Semua Transaksi')


<!-- //========== BOX CONTENT =========== -->
@section('boxcontent')

<div style="text-align:center">

        <h1>Laporan Semua Data Transaksi</h1>
        <h4>Periode Laporan : {{$periodelaporan}}</h4>
        
</div>
<!-- //========== TRXDONASI TRXDONASI TRXDONASI TRXDONASI TRXDONASI TRXDONASI TRXDONASI TRXDONASI===========-->
<!-- //========== JIKA OPSI TRANSAKSI DONASI AKTIF ========== -->
@if ($istrxdonasi == 1)
    <h2>Transaksi Donasi</h2>
    <table class="table table-striped table-bordered table-condensed">
        <thead class="bg-blue">
            <tr>\
                <th style="text-align:center;width:30px">No.</th>
                <th style="text-align:center;width:75px">Tanggal</th>
                <th style="text-align:center;width:150px">Amil</th>
                <th style="text-align:center;width:150px">Donatur</th>
                <th style="text-align:center;width:300px">Rincian</th>
                <th style="text-align:center;width:150px">Total Donasi</th>
            </tr>
        </thead>

        <tbody>

            <?php 
                $total = 0;
            ?>

            @foreach ($datadonasi as $key=>$data)
                <tr>
                    <td style="text-align:right">{{++$key}}</td>
                    <td style="text-align:center">{{$data->tanggaldonasi}}</td>
                    <td>{{$data->amil->namaamil}}</td>
                    <td>({{config('app.kodedonatur')}}{{$data->donatur_id}}) {{$data->donatur->namadonatur}}</td>
                    
                    <?php
                    $detaildonasi = $data->trxdonasidetail;
                    ?>
                    
                    <td>

                        @if (sizeof($detaildonasi) > 0)
                            <table class="table table-condensed" style="margin-bottom:0px">
                            @foreach ($detaildonasi as $key=>$datadetail)
                                <tr>
                                    <td style="width:30px">{{++$key}}</td>
                                    <td style="width:100px">{{$datadetail->peruntukandonasi->namaperuntukandonasi}}</td>
                                    <td style="width:100px;text-align:right">{{number_format($datadetail->jumlah,0,',','.')}}</td>
                                </tr>    
                            @endforeach
                            </table>   
                        @endif
                    </td>

                    <td style="text-align:right">
                        {{number_format($data->jumlahtotal,0,',','.')}}
                        <br/>
                        @if ($data->keterangan != null)
                            <small><em>({{$data->keterangan}})</em></small>    
                        @endif
                        
                    </td>
                </tr>    
                <?php 
                    $total += $data->jumlahtotal;
                ?>
            @endforeach
                <tr class="bg-navy">
                    <td></td>
                    <td colspan="4" style="text-align:center"><strong>TOTAL</strong></td>
                    <td style="text-align:right">{{number_format($total,0,',','.')}}</td>
                </tr>    

        </tbody>

    </table>
    <br/><hr/>
@endif


<!-- //========== TRXKOTAK INFAQ TRXKOTAK INFAQ TRXKOTAK INFAQ TRXKOTAK INFAQ TRXKOTAK INFAQ TRXKOTAK INFAQ TRXKOTAK INFAQ TRXKOTAK INFAQ===========-->
<!-- //========== JIKA OPSI TRANSAKSI KOTAK INFAQ AKTIF ========== -->
@if ($istrxkotakinfaq == 1)
    <h2>Transaksi Kotak Infaq</h2>
    <table class="table table-striped table-bordered table-condensed">
        <thead class="bg-blue">
            <tr>
                <th style="text-align:center;width:30px">No.</th>
                <th style="text-align:center;width:75px">Tanggal</th>
                <th style="text-align:center;width:150px">Amil</th>
                <th style="text-align:center;width:150px">Donatur</th>
                <th style="text-align:center;width:300px">Keterangan</th>
                <th style="text-align:center;width:150px">Total Kotak Infaq</th>
            </tr>
        </thead>

        <tbody>

            <?php 
                $total = 0;
            ?>

            @foreach ($datakotakinfaq as $key=>$data)
                <tr>
                    <td style="text-align:right">{{++$key}}</td>
                    <td style="text-align:center">{{$data->tanggaldonasi}}</td>
                    <td>{{$data->amil->namaamil}}</td>
                    <td>({{config('app.kodedonatur')}}{{$data->donatur_id}}) {{$data->donatur->namadonatur}}</td>
                    <td><em>{{$data->keterangan}}</em></td>
                    <td style="text-align:right">{{number_format($data->jumlahtotal,0,',','.')}}</td>
                </tr>    
                <?php 
                    $total += $data->jumlahtotal;
                ?>
            @endforeach
                <tr class="bg-navy">
                    <td></td>
                    <td colspan="4" style="text-align:center"><strong>TOTAL</strong></td>
                    <td style="text-align:right">{{number_format($total,0,',','.')}}</td>
                </tr>    

        </tbody>

    </table>
    <br/><hr/>
@endif


<!-- //========== TRXIBRANKASKU TRXIBRANKASKU TRXIBRANKASKU TRXIBRANKASKU TRXIBRANKASKU TRXIBRANKASKU TRXIBRANKASKU TRXIBRANKASKU===========-->
<!-- //========== JIKA OPSI TRANSAKSI IBRANKASKU AKTIF ========== -->
@if ($istrxibrankasku == 1)
    <h2>Transaksi iBrankasku</h2>
    <table class="table table-striped table-bordered table-condensed">
        <thead class="bg-blue">
            <tr>
                <th style="text-align:center;width:30px">No.</th>
                <th style="text-align:center;width:75px">Tanggal</th>
                <th style="text-align:center;width:150px">Amil</th>
                <th style="text-align:center;width:150px">Donatur</th>
                <th style="text-align:center;width:300px">Deskripsi Barang</th>
                <th style="text-align:center;width:150px">Estimasi Valuasi</th>
            </tr>
        </thead>

        <tbody>

            <?php 
                $total = 0;
            ?>

            @foreach ($dataibrankasku as $key=>$data)
                <tr>
                    <td style="text-align:right">{{++$key}}</td>
                    <td style="text-align:center">{{$data->tanggaldonasi}}</td>
                    <td>{{$data->amil->namaamil}}</td>
                    <td>({{config('app.kodedonatur')}}{{$data->donatur_id}}) {{$data->donatur->namadonatur}}</td>
                    <td><em>{{$data->deskripsibarang}}</em></td>
                    <td style="text-align:right">{{number_format($data->nominalvaluasi,0,',','.')}}</td>
                </tr>    
                <?php 
                    $total += $data->nominalvaluasi;
                ?>
            @endforeach
                <tr class="bg-navy">
                    <td></td>
                    <td colspan="4" style="text-align:center"><strong>TOTAL</strong></td>
                    <td style="text-align:right">{{number_format($total,0,',','.')}}</td>
                </tr>    

        </tbody>

    </table>

    <br/><hr/>
@endif

@endsection

<!-- //===========SCRIPT FOR THE FOOTER  ===========   -->
@section('footer-code')
    
@endsection
