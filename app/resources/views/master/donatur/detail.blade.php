
<!-- // donatur -->

@extends('master.layout')

<!-- //========== SITE TITLE ======== -->
@section('pagename', 'Detail Donatur')

<!-- //========== MODUL HEADER ========== -->
@section('modulname', 'Donatur')

@section('modulsection', 'Detail')
@section('modulicon', 'fa fa-trash')

<!-- //===========BOX  HEADER =========== -->
@section('boxheader-title', 'Detail Donatur')

@section('boxheader-instruction', 'silakan Klik Edit / Hapus untuk mengubah Data')

<!-- //===========BOX MESSAGE, for ANY ALERT AVAILABLE =========== -->
@section('boxmessage')

    <!--//ambil dari file untuk formatnya   -->
    @include('master/general/boxmessage')
    
@endsection


<!-- //========== BOX CONTENT =========== -->
@section('boxcontent')

     

        <table class="table table-striped">
            <thead>
                <tr>
                    <th width="30%">KEY</th>
                    <th>VALUE</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Nama Donatur</th>
                    <td>{{$data->namadonatur}}</td>
                </tr>
                
                <tr>
                    <th>Jenis Donatur</th>
                    <td>
                        @if ($data->isdonaturrutin==1)
                            <a href="#" class="btn btn-sm btn-primary"> Donatur Rutin, </a>             
                        @endif
                        
                        @if ($data->iskotakinfaq)
                            <a href="#" class="btn btn-sm btn-primary"> Kotak Infaq,   </a>            
                        @endif
                        @if ($data->isdonaturinsidental)
                            <a href="#" class="btn btn-sm btn-primary"> Donatur Insidental,   </a>            
                        @endif

                    </td>

                </tr>

                <tr>
                    <th>Petugas AMIL</th>
                    <td><a class="btn btn-success" href="{{url('')}}/amil/{{$amil->id}}">{{$amil->namaamil}}</a></td>
                </tr>

                <tr>
                    <th>Nomor Telepon Donatur</th>
                    <td>{{$data->nomortelepondonatur}}</td>
                </tr>


                <tr>
                    <th>Alamat Donatur</th>
                    <td>{{$data->alamatdonatur}}</td>
                </tr>

                
                <tr>
                    <th>Tanggal Lahir</th>
                    <td>{{$data->tanggallahir}}</td>
                </tr>
                
                <tr>
                    <th>Pekerjaan Donatur</th>
                    <td><a class="btn btn-primary" href="#">{{$pekerjaandonatur->namapekerjaandonatur}}</a></td>
                </tr>
                

                

                <tr>
                    <th>Jenis Kelamin</th>
                    <td>
                        @if ($data->jeniskelamin == 1)
                            Laki-Laki
                        @elseif ($data->jeniskelamin == 2)
                            Perempuan
                        @else 
                            Tidak Disebutkan
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
            <a class="btn btn-warning" href="{{url('')}}/donatur/{{$data->id}}/edit">Edit</a>
            <a class="btn btn-danger" href="{{url('')}}/donatur/{{$data->id}}/delete">Hapus</a>
        </div>
    

@endsection

<!-- //===========SCRIPT FOR THE FOOTER  ===========   -->
@section('footer-code')
    
@endsection
