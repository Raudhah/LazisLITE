<!-- // pekerjaan donatur -->

@extends('master.layout')

<!-- //========== SITE TITLE ======== -->
@section('pagename', 'Tambah Amil')

<!-- //========== MODUL HEADER ========== -->
@section('modulname', 'Amil')

@section('modulsection', 'Tambah')
@section('modulicon', 'fa fa-plus')

<!-- //===========BOX  HEADER =========== -->
@section('boxheader-title', 'Tambah Amil')

@section('boxheader-instruction', 'Isi form berikut. Tanda * wajib diisi. Hanya Amil yang aktif akan muncul saat Transaksi')

<!-- //===========BOX MESSAGE, for ANY ALERT AVAILABLE =========== -->
@section('boxmessage')

    <!--//ambil dari file untuk formatnya   -->
    @include('master/general/boxmessage')

@endsection


<!-- //========== BOX CONTENT =========== -->
@section('boxcontent')


<!-- form start -->
<form class="form-horizontal" method="POST" action="/amil">
{{@csrf_field()}}


        <div class="form-group">
            <label for="namaamil" class="col-sm-2 control-label input-lg">
                Nama Amil *
            </label>

            <div class="col-sm-10">
                <input type="text" class="form-control input-lg" name="namaamil" value="{{old('namaamil')}}" id="namaamil" placeholder="Nama Amil" required>
            </div>

        </div>

        <div class="form-group">
            <label for="alamatamil" class="col-sm-2 control-label input-lg">
                Alamat Amil
            </label>

            <div class="col-sm-10">
                <input type="text" class="form-control input-lg" name="alamatamil" value="{{old('alamatamil')}}" id="alamatamil" placeholder="Jl... No...">
            </div>

        </div>

        <div class="form-group">
            <label for="nomorteleponamil" class="col-sm-2 control-label input-lg">
                Nomor Telepon Amil
            </label>

            <div class="col-sm-10">
                <input type="text" class="form-control input-lg" name="nomorteleponamil" value="{{old('nomorteleponamil')}}" id="nomorteleponamil" placeholder="08xxxxx">
            </div>

        </div>

        <div class="form-group">
            <label for="statusaktif" class="col-sm-2 control-label input-lg">
                Status Aktif
            </label>

            <div class="col-sm-10">

                    <label class="input-lg">
                        <input type="radio" name="statusaktif" checked  value="1"> Aktif 
                    </label>
                    <label class="input-lg">
                        <input type="radio" name="statusaktif" value='0'> Non-Aktif
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
            <button type="submit" class="btn btn-info btn-lg">Tambah Data</button>
        </div>
    
    </form>
    <!-- /form -->


@endsection

<!-- //===========SCRIPT FOR THE FOOTER  ===========   -->
@section('footer-code')
    
@endsection
