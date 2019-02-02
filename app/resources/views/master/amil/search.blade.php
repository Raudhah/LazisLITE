<!-- // pekerjaan donatur -->

@extends('master.layout')

<!-- //========== SITE TITLE ======== -->
@section('pagename', 'Cari Amil')

<!-- //========== MODUL HEADER ========== -->
@section('modulname', 'Amil')

@section('modulsection', 'Cari')
@section('modulicon', 'fa fa-search')

<!-- //===========BOX  HEADER =========== -->
@section('boxheader-title', 'Cari Amil')

@section('boxheader-instruction', 'Silakan isi pada bagian yang ingin dicari. Kosongi / Biarkan pada bagian yang tidak menjadi kriteria pencarian')

<!-- //===========BOX MESSAGE, for ANY ALERT AVAILABLE =========== -->
@section('boxmessage')

    <!--//ambil dari file untuk formatnya   -->
    @include('master/general/boxmessage')

@endsection


<!-- //========== BOX CONTENT =========== -->
@section('boxcontent')


<!-- form start -->
<form class="form-horizontal" method="POST" action="{{url('')}}/amil/search">
{{@csrf_field()}}


        <div class="form-group">
            <label for="namaamil" class="col-sm-2 control-label input-lg">
                Mengandung Nama... 
            </label>

            <div class="col-sm-10">
                <input type="text" class="form-control input-lg" name="namaamil" value="{{old('namaamil')}}" id="namaamil" placeholder="Nama Amil">
            </div>

        </div>

        <div class="form-group">
            <label for="alamatamil" class="col-sm-2 control-label input-lg">
                Alamat di sekitar...
            </label>

            <div class="col-sm-10">
                <input type="text" class="form-control input-lg" name="alamatamil" value="{{old('alamatamil')}}" id="alamatamil" placeholder="Jl... No...">
            </div>

        </div>

        <div class="form-group">
            <label for="nomorteleponamil" class="col-sm-2 control-label input-lg">
                Nomor Telepon Mengandung ...
            </label>

            <div class="col-sm-10">
                <input type="text" class="form-control input-lg" name="nomorteleponamil" value="{{old('nomorteleponamil')}}" id="nomorteleponamil" placeholder="misal : 8787">
            </div>

        </div>

        <div class="form-group">
            <label for="statusaktif" class="col-sm-2 control-label input-lg">
                Status Aktif
            </label>

            <div class="col-sm-10">

                    <label class="input-lg">
                        <input type="radio" name="statusaktif" checked  value="2"> Semua Status 
                    </label>
                    <label class="input-lg">
                        <input type="radio" name="statusaktif" value="1"> Aktif 
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
            <button type="submit" class="btn btn-info btn-lg">Cari Data</button>
        </div>
    
    </form>
    <!-- /form -->


@endsection

<!-- //===========SCRIPT FOR THE FOOTER  ===========   -->
@section('footer-code')
    
@endsection
