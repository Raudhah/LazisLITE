<!-- // pekerjaan donatur -->

@extends('master.layout')

<!-- //========== SITE TITLE ======== -->
@section('pagename', 'Edit Konfigurasi')

<!-- //========== MODUL HEADER ========== -->
@section('modulname', 'Konfigurasi')

@section('modulsection', 'Edit')
@section('modulicon', 'fa fa-plus')

<!-- //===========BOX  HEADER =========== -->
@section('boxheader-title', 'Edit Konfigurasi')

@section('boxheader-instruction', 'Isi form berikut. Tanda * wajib diisi. Hanya Konfigurasi yang aktif akan muncul saat Transaksi')

<!-- //===========BOX MESSAGE, for ANY ALERT AVAILABLE =========== -->
@section('boxmessage')

    <!--//ambil dari file untuk formatnya   -->
    @include('master/general/boxmessage')

@endsection


<!-- //========== BOX CONTENT =========== -->
@section('boxcontent')


<!-- form start -->
<form class="form-horizontal" method="POST" action="/konfigurasi/{{$data->id}}">
{{@csrf_field()}}
{{method_field('PATCH')}}

        <!-- //namaprogram -->
        <div class="form-group">
            <label for="namaprogram" class="col-sm-2 control-label input-lg">
                Nama Program *
            </label>

            <div class="col-sm-10">
                <input type="text" class="form-control input-lg" name="namaprogram" value="{{old('namaprogram', $data->namaprogram)}}" id="namaprogram" required>
            </div>
        </div>
 
        <!-- //kodelaz -->
        <div class="form-group">
            <label for="kodelaz" class="col-sm-2 control-label input-lg">
                KODE LAZ *
            </label>

            <div class="col-sm-10">
                <input type="text" class="form-control input-lg" name="kodelaz" value="{{old('kodelaz', $data->kodelaz)}}" id="kodelaz" required>
            </div>
        </div>
 
        <!-- //namacabang -->
        <div class="form-group">
            <label for="namacabang" class="col-sm-2 control-label input-lg">
                Nama Cabang *
            </label>

            <div class="col-sm-10">
                <input type="text" class="form-control input-lg" name="namacabang" value="{{old('namacabang', $data->namacabang)}}" id="namacabang" required>
            </div>
        </div>
 
        <!-- //kodecabang -->
        <div class="form-group">
            <label for="kodecabang" class="col-sm-2 control-label input-lg">
                Kode Cabang *
            </label>

            <div class="col-sm-10">
                <input type="text" class="form-control input-lg" name="kodecabang" value="{{old('kodecabang', $data->kodecabang)}}" id="kodecabang" required>
            </div>
        </div>
 
        <!-- //alamatcabang -->
        <div class="form-group">
            <label for="alamatcabang" class="col-sm-2 control-label input-lg">
                Alamat Cabang *
            </label>

            <div class="col-sm-10">
                <input type="text" class="form-control input-lg" name="alamatcabang" value="{{old('alamatcabang', $data->alamatcabang)}}" id="alamatcabang" required>
            </div>
        </div>
 
        <!-- //kontakcabang -->
        <div class="form-group">
            <label for="kontakcabang" class="col-sm-2 control-label input-lg">
                Kontak Cabang *
            </label>

            <div class="col-sm-10">
                <input type="text" class="form-control input-lg" name="kontakcabang" value="{{old('kontakcabang', $data->kontakcabang)}}" id="kontakcabang" required>
            </div>
        </div>
 
        <!-- //namafilelogo -->
        <div class="form-group">
            <label for="namafilelogo" class="col-sm-2 control-label input-lg">
                Nama File Logo *
            </label>

            <div class="col-sm-10">
                <input type="text" class="form-control input-lg" name="namafilelogo" value="{{old('namafilelogo', $data->namafilelogo)}}" id="namafilelogo">
            </div>
        </div>
 
 
        <!-- //namafilettd -->
        <div class="form-group">
            <label for="namafilettd" class="col-sm-2 control-label input-lg">
                Nama File TTD *
            </label>

            <div class="col-sm-10">
                <input type="text" class="form-control input-lg" name="namafilettd" value="{{old('namafilettd', $data->namafilettd)}}" id="namafilettd">
            </div>
        </div>
 
 
        <!-- //namafilebackground -->
        <div class="form-group">
            <label for="namafilebackground" class="col-sm-2 control-label input-lg">
                Nama Program *
            </label>

            <div class="col-sm-10">
                <input type="text" class="form-control input-lg" name="namafilebackground" value="{{old('namafilebackground', $data->namafilebackground)}}" id="namafilebackground">
            </div>
        </div>
 
 

@endsection

<!-- //===========BOX  FOOTER ===========   -->
@section('boxfooter')
        
        <div class="col-sm-2">
        </div>

        <div class="col-sm-10">
            <button type="reset" class="btn btn-default btn-lg">Reset</button>
            <button type="submit" class="btn btn-info btn-lg">Update Data</button>
        </div>
    
    </form>
    <!-- /form -->


@endsection

<!-- //===========SCRIPT FOR THE FOOTER  ===========   -->
@section('footer-code')
    
@endsection
