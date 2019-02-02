<!-- // pekerjaan laporan -->

@extends('master.layoutblank')

<!-- //========== SITE TITLE ======== -->
@section('pagename', 'Laporan Per-Amil')


<!-- //========== BOX CONTENT =========== -->
@section('boxcontent')

<div style="text-align:center">

    @if ($tipelaporan == 1)
        <h1>Laporan Semua Data Transaksi Amil</h1>
        <h4>Periode Laporan : {{$periodelaporan}}</h4>
    @endif
    @if ($tipelaporan == 2)
        <h1>Laporan Tanggungan Donatur Yang Sudah Terambil</h1>
        <h4>Periode Laporan : {{$periodelaporan}}</h4>
    @endif
    @if ($tipelaporan == 3)
        <h1>Rekap Laporan Tanggungan Donatur dari Amil</h1>
    @endif
    @if ($tipelaporan == 4)
        <h1>Daftar Donatur Yang Menjadi Tanggungan</h1>
    @endif
        <h4>Amil : {{$dataamil->namaamil}} ({{config('app.kodeamil').$dataamil->id}})</h4>
        
</div>


<!-- //========== JIKA DIMINTA MENAMPILKAN LAPORAN SEMUA DATA TRANSAKSINYA ========== -->
@if ($tipelaporan==1)
        <!-- //========== TRXDONASI TRXDONASI TRXDONASI TRXDONASI TRXDONASI TRXDONASI TRXDONASI TRXDONASI===========-->
        <!-- //========== JIKA OPSI TRANSAKSI DONASI AKTIF ========== -->
        @if ($istrxdonasi == 1 && sizeof($datadonasi)>0)
            <h2>Transaksi Donasi</h2>
            <table class="table table-striped table-bordered table-condensed">
                <thead class="bg-blue">
                    <tr>
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
        @if ($istrxkotakinfaq == 1  && sizeof($datakotakinfaq)>0)
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
        @if ($istrxibrankasku == 1 && sizeof($dataibrankasku)>0)
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

@endif
<!-- //========== ENDIF TIPELAPORAN == 1 ========== -->


<!-- //========== JIKA TIPELAPORAN == 3 ========== -->
<!-- // TIPE LAPORAN YANG SUDAH TERAMBIL (DARI TANGGUNGAN AMIL)-->

@if ($tipelaporan==2)
    <!--//tampilkan daftar donaturnya dulu  ->

    <!-- // === TAMPILKAN DATA DONATUR RUTIN YANG MENJADI TANGGUNGANNYA==============   -->
    @if (sizeof($datadonatur)>0)
        
        <h3>Data Donatur Rutin</h3>
        <table class="table table-striped table-bordered table-condensed">
                <thead class="bg-blue">
                    <tr>
                        <th style="text-align:center;width:30px">No.</th>
                        <th style="text-align:center;width:30px">Kuitansi</th>
                        <th style="text-align:center;width:70px">Tanggal</th>
                        <th style="text-align:center;width:100px">Donatur</th>
                        <th style="text-align:center;width:100px">Amil Yang Mengambil</th>
                        <th style="text-align:center;width:100px">Rincian</th>
                        <th style="text-align:center;width:150px">Total</th>
                    </tr>
                </thead>

                        <?php 
                            $total = 0;
                        ?>

                <tbody>
                    @foreach ($datadonasi as $key=>$donasi)
                        <tr>
                            <td>{{++$key}}</td>
                            <td style="text-align:center">{{config('app.kodekuitansi.trxdonasi').$donasi->id}}</td>
                            <td>{{$donasi->tanggaldonasi}}</td>
                            <td>({{config('app.kodedonatur').$donasi->donatur->id}}) {{$donasi->donatur->namadonatur}}</td>
                            <td>({{config('app.kodeamil').$donasi->amil->id}}) {{$donasi->amil->namaamil}}</td>
                            <?php
                            $detaildonasi = $donasi->trxdonasidetail;
                            ?>
                            
                            <td>

                                @if (sizeof($detaildonasi) > 0)
                                    <table class="table table-condensed" style="margin-bottom:0px">
                                    @foreach ($detaildonasi as $key=>$datadetail)
                                        <tr>
                                            <td style="width:30px">{{++$key}}</td>
                                            <td style="width:100px">{{$datadetail->peruntukandonasi->namaperuntukandonasi}}</td>
                                            <td style="width:100px;text-align:right">{{number_format($datadetail->jumlah,0,',','.')}} <br/></td>
                                        </tr>    
                                    @endforeach
                                    </table>   
                                @endif
                            </td>
                            <td style="text-align:right">{{number_format($donasi->jumlahtotal,0,',','.')}}
                                    <br/><small><em>{{$donasi->keterangan}}</em></small> 
                                    @if ($donasi->insidentil == 1)
                                        <strong>(Donasi Insidentil)</strong>
                                    @endif
                                    <?php 
                                        $total += $donasi->jumlahtotal;
                                    ?>
                                    
                            </td>
                        </tr>
                    @endforeach

                    <tr class="bg-navy">
                            <td></td>
                            <td colspan="5" style="text-align:center"><strong>TOTAL</strong></td>
                            <td style="text-align:right">{{number_format($total,0,',','.')}}</td>
                    </tr>  
                    

                </tbody>
        </table>
            


    @endif

    <!-- // === TAMPILKAN DATA KOTAK INFAQ YANG MENJADI TANGGUNGANNYA==============   -->
    @if (sizeof($datakotakinfaq)>0)
        
        <h3>Data Kotak Infaq</h3>
        <table class="table table-striped table-bordered table-condensed">
                <thead class="bg-blue">
                    <tr>
                        <th style="text-align:center;width:30px">No.</th>
                        <th style="text-align:center;width:30px">Kuitansi</th>
                        <th style="text-align:center;width:70px">Tanggal</th>
                        <th style="text-align:center;width:100px">Donatur</th>
                        <th style="text-align:center;width:100px">Amil Yang Mengambil</th>
                        <th style="text-align:center;width:150px">Total</th>
                    </tr>
                </thead>

                        <?php 
                            $total = 0;
                        ?>

                <tbody>
                    @foreach ($datakotakinfaq as $key=>$donasi)
                        <tr>
                            <td>{{++$key}}</td>
                            <td style="text-align:center">{{config('app.kodekuitansi.trxkotakinfaq').$donasi->id}}</td>
                            <td>{{$donasi->tanggaldonasi}}</td>
                            <td>({{config('app.kodedonatur').$donasi->donatur->id}}) {{$donasi->donatur->namadonatur}}</td>
                            <td>({{config('app.kodeamil').$donasi->amil->id}}) {{$donasi->amil->namaamil}}</td>
                            
                            <td style="text-align:right">{{number_format($donasi->jumlahtotal,0,',','.')}}
                                    <br/><small><em>{{$donasi->keterangan}}</em></small> 
                                    @if ($donasi->insidentil == 1)
                                        <strong>(Donasi Insidentil)</strong>
                                    @endif
                                    <?php 
                                        $total += $donasi->jumlahtotal;
                                    ?>
                                    
                            </td>
                        </tr>
                    @endforeach

                    <tr class="bg-navy">
                            <td></td>
                            <td colspan="4" style="text-align:center"><strong>TOTAL</strong></td>
                            <td style="text-align:right">{{number_format($total,0,',','.')}}</td>
                    </tr>  
                    

                </tbody>
        </table>
            


    @endif

@endif


<!-- //========== JIKA TIPELAPORAN == 2 ========== -->
<!-- // TIPE LAPORAN DAFTAR DONATUR YANG SUDAH DAN BELUM JADI-->
@if ($tipelaporan==3)

    <!-- // === TAMPILKAN DATA DONATUR YANG MENJADI TANGGUNGANNYA==============   -->
    @if (sizeof($datadonatur)>0)
        <h3>Data Donatur</h3>
        <table class="table table-striped table-bordered table-condensed">
                <thead class="bg-blue">
                    <tr>
                        <th style="text-align:center;width:30px">No.</th>
                        <th style="text-align:center;width:40px">ID</th>
                        <th style="text-align:center;width:100px">Nama Donatur</th>
                        <th style="text-align:center;width:80px">Nomor Telepon</th>
                        <th style="text-align:center;width:150px">Alamat</th>
                        <th style="text-align:center;width:100px">Jenis Donatur</th>
                        <th style="text-align:center;width:300px">Status Terambil</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($datadonatur as $key=>$donatur)
                        <tr>
                            <td style="text-align:right">{{++$key}}</td>
                            <td style="text-align:center">{{config('app.kodedonatur')}}{{$donatur->id}}</td>
                            <td>{{$donatur->namadonatur}}</td>
                            
                            <td>{{$donatur->nomortelepondonatur}}</td>
                            <td>{{$donatur->alamatdonatur}}</td>

                            <td>
                                @if ($donatur->isdonaturrutin)
                                    Donatur Rutin, 
                                @endif
                                @if ($donatur->iskotakinfaq)
                                    Kotak Infaq, 
                                @endif
                                @if ($donatur->isdonaturinsidental)
                                    Insidental, 
                                @endif
                            </td>

                            <td>
                                <table class="table">
                                <!-- // check apakah donatur id ada di dalam data transaksinya ada didalamnya sini -->
                                @foreach ($datadonasi as $key=>$donasi)
                                    @if ($donasi->donatur_id == $donatur->id)
                                        <tr>
                                        <td>DONASI<a href="{{url('')}}/trxdonasi/{{$donasi->id}}" target="_blank">({{config('app.kodekuitansi.trxdonasi')}}{{$donasi->id}})</a></td>
                                        <td>{{$donasi->tanggaldonasi}}</td> 
                                        <td>{{$donasi->amil->namaamil}}</td>
                                        <td>{{ number_format($donasi->jumlahtotal,0,',','.')}}</td>
                                        </tr>
                                    @endif
                                @endforeach

                                <!-- // check apakah donatur id ada di dalam data transaksinya ada didalamnya sini -->
                                @foreach ($datakotakinfaq as $key=>$kotakinfaq)
                                    @if ($kotakinfaq->donatur_id == $donatur->id)
                                        <tr>
                                        <td>KTKINFAQ<a href="{{url('')}}/trxkotakinfaq/{{$kotakinfaq->id}}" target="_blank">({{config('app.kodekuitansi.trxkotakinfaq')}}{{$kotakinfaq->id}})</a></td>
                                        <td>{{$kotakinfaq->tanggaldonasi}} </td>
                                        <td>{{$kotakinfaq->amil->namaamil}} </td>
                                        <td> {{number_format($kotakinfaq->jumlahtotal,0,',','.')}}   </td>
                                        </tr>
                                    @endif
                                @endforeach
                                    </table>

                            </td>
                        </tr>
                    @endforeach

                </tbody>
        </table>
        <hr/>
        <br/>
    @endif




@endif


<!-- //========== JIKA TIPELAPORAN == 4 ========== -->
<!-- // TIPE LAPORAN TAMPILKAN DONATUR YANG JADI TANGGUNGAN -->
<!-- //========== JIKA TIPELAPORAN == 4 ========== -->
@if ($tipelaporan==4)

    <!-- // === TAMPILKAN DATA DONATUR RUTIN YANG MENJADI TANGGUNGANNYA==============   -->
    @if (sizeof($datadonaturrutin)>0)
        <h3>Data Donatur Rutin</h3>
        <table class="table table-striped table-bordered table-condensed">
                <thead class="bg-blue">
                    <tr>
                        <th style="text-align:center;width:30px">No.</th>
                        <th style="text-align:center;width:75px">ID Donatur</th>
                        <th style="text-align:center;width:100px">Nama Donatur</th>
                        <th style="text-align:center;width:150px">Nomor Telepon</th>
                        <th style="text-align:center;width:150px">Alamat</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($datadonatur as $key=>$donatur)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{config('app.kodedonatur')}}{{$donatur->id}}</td>
                            <td>{{$donatur->namadonatur}}</td>
                            <td>{{$donatur->nomortelepondonatur}}</td>
                            <td>{{$donatur->alamatdonatur}}</td>
                        </tr>
                    @endforeach

                </tbody>
        </table>
        <hr/>
        <br/>
    @endif
        
    <!--    // === TAMPILKAN DATA DONATUR KOTAK INFAQ YANG MENJADI TANGGUNGANNYA============== -->
    @if (sizeof($datadonaturkotakinfaq)>0)
        <h3>Data Donatur Kotak Infaq</h3>
        <table class="table table-striped table-bordered table-condensed">
                <thead class="bg-blue">
                    <tr>
                        <th style="text-align:center;width:30px">No.</th>
                        <th style="text-align:center;width:75px">ID Donatur</th>
                        <th style="text-align:center;width:100px">Nama Donatur</th>
                        <th style="text-align:center;width:150px">Nomor Telepon</th>
                        <th style="text-align:center;width:150px">Alamat</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($datadonaturkotakinfaq as $key=>$donatur)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{config('app.kodedonatur')}}{{$donatur->id}}</td>
                            <td>{{$donatur->namadonatur}}</td>
                            <td>{{$donatur->nomortelepondonatur}}</td>
                            <td>{{$donatur->alamatdonatur}}</td>
                        </tr>
                    @endforeach

                </tbody>
        </table>
        <hr/>
        <br/>
    @endif
        
    <!-- // === TAMPILKAN DATA DONATUR INSIDENTAL YANG MENJADI TANGGUNGANNYA============== -->
    @if (sizeof($datadonaturinsidental)>0)
        <h3>Data Donatur Insidental</h3>
        <table class="table table-striped table-bordered table-condensed">
                <thead class="bg-blue">
                    <tr>
                        <th style="text-align:center;width:30px">No.</th>
                        <th style="text-align:center;width:75px">ID Donatur</th>
                        <th style="text-align:center;width:100px">Nama Donatur</th>
                        <th style="text-align:center;width:150px">Nomor Telepon</th>
                        <th style="text-align:center;width:150px">Alamat</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($datadonaturinsidental as $key=>$donatur)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{config('app.kodedonatur')}}{{$donatur->id}}</td>
                            <td>{{$donatur->namadonatur}}</td>
                            <td>{{$donatur->nomortelepondonatur}}</td>
                            <td>{{$donatur->alamatdonatur}}</td>
                        </tr>
                    @endforeach

                </tbody>
        </table>
        <hr/>
        <br/>
    @endif
        

    
@endif
<!-- //========== ENDIF TIPELAPORAN == 4 ========== -->


@endsection

<!-- //===========SCRIPT FOR THE FOOTER  ===========   -->
@section('footer-code')
    
@endsection
