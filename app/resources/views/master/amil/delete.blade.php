
<!-- // amil -->

@extends('master.layout')

<!-- //========== SITE TITLE ======== -->
@section('pagename', 'Hapus Amil')

<!-- //========== MODUL HEADER ========== -->
@section('modulname', 'Amil')

@section('modulsection', 'Hapus')
@section('modulicon', 'fa fa-trash')

<!-- //===========BOX  HEADER =========== -->
@section('boxheader-title', 'Hapus Amil')

@section('boxheader-instruction', 'Apakah Yakin Anda Mau Menghapus Data Berikut?')

<!-- //===========BOX MESSAGE, for ANY ALERT AVAILABLE =========== -->
@section('boxmessage')

    <!--//ambil dari file untuk formatnya   -->
    @include('master/general/boxmessage')
    
@endsection


<!-- //========== BOX CONTENT =========== -->
@section('boxcontent')

<!-- form start -->
<form class="form-horizontal" method="POST" action="{{url('')}}/amil/{{$data->id}}">
{{@csrf_field()}}
{{method_field('DELETE')}}

     

        <table class="table table-striped">
            <thead>
                <tr>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Nama Amil</th>
                    <td>{{$data->namaamil}}</td>
                </tr>

                <tr>
                    <th>Alamat Amil</th>
                    <td>{{$data->alamatamil}}</td>
                </tr>

                <tr>
                    <th>Nomor Telepon Amil</th>
                    <td>{{$data->nomorteleponamil}}</td>
                </tr>
                

                <tr>
                    <th>Status</th>
                    <td>
                        @if ($data->statusaktif)
                            Aktif
                        @else
                            Non-Aktif
                        @endif
    
                    </td>
                </tr>
            </tbody>
        </table>

@endsection

<!-- //===========BOX  FOOTER ===========   -->
@section('boxfooter')
        
        <div class="col-sm-2">
        </div>

        <div class="col-sm-10">

        @if (($terpakaitrxdonasi + $terpakaitrxkotakinfaq + $terpakaitrxibrankasku + $terpakaidonatur) > 0)
            <div class="alert alert-danger alert-dismissable">
                Maaf Data Tidak bisa dihapus, karena masih terpakai di :
                <ol> 
                @if ($terpakaitrxdonasi > 0)
                    <li><a href="{{url('')}}/trxdonasi/search" target="_blank">Transaksi Donasi :  {{$terpakaitrxdonasi}} Transaksi</a></li>
                @endif
                @if ($terpakaitrxkotakinfaq > 0)
                    <li><a href="{{url('')}}/trxkotakinfaq/search" target="_blank">Transaksi Kotak Infaq :  {{$terpakaitrxkotakinfaq}} Transaksi</a></li>
                @endif
                @if ($terpakaitrxibrankasku > 0)
                    <li><a href="{{url('')}}/trxibrankasku/search" target="_blank">Transaksi iBrankasku :  {{$terpakaitrxibrankasku}} Transaksi</a></li>
                @endif
                @if ($terpakaidonatur > 0)
                    <li><a href="{{url('')}}/donatur/search" target="_blank">Data Donatur :  {{$terpakaidonatur}} Data</a></li>
                @endif
                </ol>
            </div>

        @else 
                <button type="reset" class="btn btn-default btn-lg">Batal</button>
                <button type="submit" class="btn btn-danger btn-lg">HAPUS Data</button>
        @endif

        </div>

        
    
    </form>
    <!-- /form -->


@endsection

<!-- //===========SCRIPT FOR THE FOOTER  ===========   -->
@section('footer-code')
    
@endsection
