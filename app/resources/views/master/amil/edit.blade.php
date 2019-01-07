<!-- // pekerjaan donatur -->

@extends('master.layout')

<!-- //========== SITE TITLE ======== -->
@section('pagename', 'Edit Amil')

<!-- //========== MODUL HEADER ========== -->
@section('modulname', 'Amil')

@section('modulsection', 'Edit')
@section('modulicon', 'fa fa-plus')

<!-- //===========BOX  HEADER =========== -->
@section('boxheader-title', 'Edit Amil')

@section('boxheader-instruction', 'Isi form berikut. Tanda * wajib diisi. Hanya Amil yang aktif akan muncul saat Transaksi')

<!-- //===========BOX MESSAGE, for ANY ALERT AVAILABLE =========== -->
@section('boxmessage')

    <!--//ambil dari file untuk formatnya   -->
    @include('master/general/boxmessage')

@endsection


<!-- //========== BOX CONTENT =========== -->
@section('boxcontent')


<!-- form start -->
<form class="form-horizontal" method="POST" action="/amil/{{$data->id}}">
{{@csrf_field()}}
{{method_field('PATCH')}}

        <div class="form-group">
            <label for="namaamil" class="col-sm-2 control-label input-lg">
                Nama Amil *
            </label>

            <div class="col-sm-10">
                <input type="text" class="form-control input-lg" name="namaamil" value="{{old('namaamil', $data->namaamil)}}" id="namaamil" placeholder="Nama Amil" required>
            </div>

        </div>

        <div class="form-group">
            <label for="alamatamil" class="col-sm-2 control-label input-lg">
                Alamat Amil
            </label>

            <div class="col-sm-10">
                <input type="text" class="form-control input-lg" name="alamatamil" value="{{old('alamatamil', $data->alamatamil)}}" id="alamatamil" placeholder="Jl... No...">
            </div>

        </div>

        <div class="form-group">
            <label for="nomorteleponamil" class="col-sm-2 control-label input-lg">
                Nomor Telepon Amil
            </label>

            <div class="col-sm-10">
                <input type="text" class="form-control input-lg" name="nomorteleponamil" value="{{old('nomorteleponamil', $data->nomorteleponamil)}}" id="nomorteleponamil" placeholder="08xxxxx">
            </div>

        </div>

        <div class="form-group">
            <label for="statusaktif" class="col-sm-2 control-label input-lg">
                Status Aktif
            </label>

            <div class="col-sm-10">

                    <label class="input-lg">
                        <input type="radio" name="statusaktif" value="1" {{$data->statusaktif==1 ? "checked" : ""}}> Aktif 
                    </label>
                    <label class="input-lg">
                        <input type="radio" name="statusaktif" value='0' {{$data->statusaktif==0 ? "checked" : ""}}> Non-Aktif
                    </label>
            </div>

        </div>

@endsection

<!-- //===========BOX  FOOTER ===========   -->
@section('boxfooter')
        
        <div class="col-sm-2">
        </div>

        <div class="col-sm-10">
            <button type="reset" class="btn btn-default btn-lg">Batal</button>
            <button type="submit" class="btn btn-info btn-lg">Edit Data</button>
        </div>
    
    </form>
    <!-- /form -->


@endsection

<!-- //===========SCRIPT FOR THE FOOTER  ===========   -->
@section('footer-code')
    
@endsection
