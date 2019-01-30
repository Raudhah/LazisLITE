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
<form class="form-horizontal" method="POST" enctype="multipart/form-data"  action="{{url('')}}/konfigurasi/{{$data->id}}">
{{@csrf_field()}}
{{method_field('PATCH')}}

        <!-- //namalaz -->
        <div class="form-group">
            <label for="namalaz" class="col-sm-2 control-label input-lg">
                Nama LAZ *
            </label>

            <div class="col-sm-10">
                <input type="text" class="form-control input-lg" name="namalaz" value="{{old('namalaz', $data->namalaz)}}" id="namalaz" required="required">
            </div>
        </div>
 
        <!-- //kodelaz -->
        <div class="form-group">
            <label for="kodelaz" class="col-sm-2 control-label input-lg">
                Kode LAZ *
            </label>

            <div class="col-sm-10">
                <input type="text" class="form-control input-lg" name="kodelaz" value="{{old('kodelaz', $data->kodelaz)}}" id="kodelaz" required="required">
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
                <input type="text" class="form-control input-lg" name="alamatcabang" value="{{old('alamatcabang', $data->alamatcabang)}}" id="alamatcabang" required="required">
            </div>
        </div>
 
        <!-- //nomorteleponcabang -->
        <div class="form-group">
            <label for="nomorteleponcabang" class="col-sm-2 control-label input-lg">
                Nomor Telepon*
            </label>

            <div class="col-sm-10">
                <input type="text" class="form-control input-lg" name="nomorteleponcabang" value="{{old('nomorteleponcabang', $data->nomorteleponcabang)}}" id="nomorteleponcabang" required="required">
            </div>
        </div>
 
        <!-- //websitecabang -->
        <div class="form-group">
            <label for="websitecabang" class="col-sm-2 control-label input-lg">
                Website LAZ
            </label>

            <div class="col-sm-10">
                <input type="text" class="form-control input-lg" name="websitecabang" value="{{old('websitecabang', $data->websitecabang)}}" id="websitecabang">
            </div>
        </div>
 
        <!-- //emailcabang -->
        <div class="form-group">
            <label for="emailcabang" class="col-sm-2 control-label input-lg">
                Email Cabang
            </label>

            <div class="col-sm-10">
                <input type="text" class="form-control input-lg" name="emailcabang" value="{{old('emailcabang', $data->emailcabang)}}" id="emailcabang">
            </div>
        </div>

        <!-- //nomorrekeningcabang -->
        <div class="form-group">
            <label for="nomorrekeningcabang" class="col-sm-2 control-label input-lg">
                Nomor Rekening Cabang
            </label>

            <div class="col-sm-10">
                <input type="text" class="form-control input-lg" name="nomorrekeningcabang" value="{{old('nomorrekeningcabang', $data->nomorrekeningcabang)}}" id="nomorrekeningcabang">
            </div>
        </div>

        <!-- //keterangan -->
        <div class="form-group">
            <label for="keterangan" class="col-sm-2 control-label input-lg">
                Keterangan
            </label>

            <div class="col-sm-10">
                <textarea rows="4" class="form-control input-lg" name="keterangan" id="keterangan">{{old('keterangan', $data->keterangan)}}</textarea>
            </div>
        </div>

        <!-- //tekskuitansi -->
        <div class="form-group">
            <label for="tekskuitansi" class="col-sm-2 control-label input-lg">
                Teks di Kuitansi
            </label>

            <div class="col-sm-10">
                <textarea rows="4" class="form-control input-lg" name="tekskuitansi" id="tekskuitansi">{{old('tekskuitansi', $data->tekskuitansi)}}</textarea>
            </div>
        </div>
 
        <!-- //namafilelogo -->
        <div class="form-group">
            <label for="namafilelogo" class="col-sm-2 control-label input-lg">
                File Logo 
            </label>

            <div class="col-sm-10">
                <input type="file" name="filelogo" value="{{old('filelogo', $data->filelogo)}}" id="filelogo">
                <input type="hidden" class="form-control input-lg" name="namafilelogo" value="{{old('namafilelogo', $data->namafilelogo)}}" id="namafilelogo">
                <br/> File : {{url('storage/')}}/{{$data->namafilelogo}}
                <br/>
                <img src="{{url('storage/')}}/{{$data->namafilelogo}}" alt="file logo" style="height:200px;border:1px solid black">
            </div>
        </div>
 
 
        <!-- //namafilettd -->
        <div class="form-group">
            <label for="namafilettd" class="col-sm-2 control-label input-lg">
                File Tanda Tangan 
            </label>

            <div class="col-sm-10">
                <input type="file" name="filettd" value="{{old('filettd', $data->filettd)}}" id="filettd">
                <input type="hidden" class="form-control input-lg" name="namafilettd" value="{{old('namafilettd', $data->namafilettd)}}" id="namafilettd">
                <br/> File : {{url('storage/')}}/{{$data->namafilettd}}
                <br/>
                <img src="{{url('storage/')}}/{{$data->namafilettd}}" alt="file Tanda Tangan" style="height:200px;border:1px solid black">
            </div>
        </div>
 
 
        <!-- //namafilebackground -->
        <div class="form-group">
            <label for="namafilebackground" class="col-sm-2 control-label input-lg">
                File Background Kuitansi
            </label>

            <div class="col-sm-10">
                    <input type="file" name="filebackground" value="{{old('filebackground', $data->filebackground)}}" id="filebackground">
                    <input type="hidden" class="form-control input-lg" name="namafilebackground" value="{{old('namafilebackground', $data->namafilebackground)}}" id="namafilebackground">
                    <br/> File : {{url('storage/')}}/{{$data->namafilebackground}}
                    <br/>
                    <img src="{{url('storage/')}}/{{$data->namafilebackground}}" alt="file Background" style="height:200px;border:1px solid black">
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
