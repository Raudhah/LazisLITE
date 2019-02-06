
<!-- // amil -->

@extends('master.layout')

<!-- //========== SITE TITLE ======== -->
@section('pagename', 'Petunjuk Penggunaan Untuk Admin   ')

<!-- //========== MODUL HEADER ========== -->
@section('modulname', 'Panduan Admin')

@section('modulsection', 'Detail')
@section('modulicon', 'fa fa-trash')

<!-- //===========BOX  HEADER =========== -->
@section('boxheader-title', 'panduan Bagi Admin harian Laz')

@section('boxheader-instruction', '')

<!-- //===========BOX MESSAGE, for ANY ALERT AVAILABLE =========== -->
@section('boxmessage')

    <!--//ambil dari file untuk formatnya   -->
    @include('master/general/boxmessage')
    
@endsection


<!-- //========== BOX CONTENT =========== -->
@section('boxcontent')
   
<span id="definisi">
    <h2>Definisi</h2>
</span>
<blockquote>
    Admin Adalah orang yang bertugas sehari-hari mencatat dan mengelola transaksi donasi, dan juga mengelola data para donatur. 
Admin membawahi amil-amil yang ada dalam LAZ, meng-entry-kan data, mencetakkan kuitansi beserta laporan-laporan. 
Dalam 1 lembaga boleh jadi terdapat lebih dari 1 Admin.
</blockquote>

<hr/>

    <ol>
        <li><a href="{{url('')}}/panduan/trxdonasi" target="_blank">Modul Transaksi Donasi       </a></li>
        <li><a href="{{url('')}}/panduan/trxkotakinfaq" target="_blank">Modu Transaksi iBrankasku    </a></li>
        <li><a href="{{url('')}}/panduan/trxibrankasku" target="_blank">Modul Kotak Infaq            </a></li>
        <li><a href="{{url('')}}/panduan/donatur" target="_blank">Modul Donatur                </a></li>
        <li><a href="{{url('')}}/panduan/amil" target="_blank">Modul Amil                   </a></li>
        <li><a href="{{url('')}}/panduan/laporan" target="_blank">Modul Laporan-Laporan        </a></li>
        <li><a href="{{url('')}}/panduan/panduan" target="_blank">Modul Petunjuk Penggunaan    </a></li>
        <li><a href="{{url('')}}/panduan/gantipassword" target="_blank">Modul Ganti Password         </a></li>
        <li><a href="{{url('')}}/panduan/logout" target="_blank">Menu Logout                  </a></li>
    </ol>

@endsection

<!-- //===========BOX  FOOTER ===========   -->
@section('boxfooter')
        
        <div class="col-sm-2">
        </div>

@endsection

<!-- //===========SCRIPT FOR THE FOOTER  ===========   -->
@section('footer-code')
    
@endsection
