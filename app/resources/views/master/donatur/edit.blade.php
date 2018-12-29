<!-- // donatur -->

@extends('master.layout')

<!-- //========== SITE TITLE ======== -->
@section('pagename', 'Edit Donatur')

<!-- //========== MODUL HEADER ========== -->
@section('modulname', 'Donatur')

@section('modulsection', 'Edit')
@section('modulicon', 'fa fa-pencil')

<!-- //===========BOX  HEADER =========== -->
@section('boxheader-title', 'Edit Donatur')

@section('boxheader-instruction', 'Isi form berikut. Tanda * wajib diisi. Hanya Donatur yang aktif akan muncul saat Transaksi')

<!-- //===========BOX MESSAGE, for ANY ALERT AVAILABLE =========== -->
@section('boxmessage')

    <!--//ambil dari file untuk formatnya   -->
    @include('master/general/boxmessage')

@endsection


<!-- //========== BOX CONTENT =========== -->
@section('boxcontent')


<!-- form start -->
<form class="form-horizontal" method="POST" action="/donatur">
{{@csrf_field()}}

        <!-- // Nama Donatur -->
        <div class="form-group">
            <label for="namadonatur" class="col-sm-2 control-label input-lg">
                Nama Donatur *
            </label>

            <div class="col-sm-10">
                <input type="text" class="form-control input-lg" name="namadonatur" value="{{old('namadonatur', $data->namadonatur)}}" id="namadonatur" placeholder="Nama Donatur" required>
            </div>
        </div>

        <!-- // Jenis Donatur -->
        <div class="form-group">

            <label class="col-sm-2 control-label input-lg">
                Jenis Donatur*
            </label>
            
            <div class="col-sm-10">
                <label class="input-lg">
                    <input type="checkbox" name="isdonaturrutin"> Donatur Rutin
                </label>
                <label class="input-lg">
                    <input type="checkbox" name="isdonaturkotakinfaq"> Kotak Infaq
                </label>
                <label class="input-lg">
                    <input type="checkbox" name="isdonaturinsidental"> Donatur Insidental
                </label>
            </div>
        </div>


        <!-- //AMil yang bertanggung Jawab -->
        <div class="form-group">
            <label for="amil_id" class="col-sm-2 control-label input-lg">
                Petugas Amil* 
            </label>

            <div class="col-sm-10">
                <select name="amil_id" id="amil_id" class="form-control input-lg">
                    @foreach($listamil as $amil)
                    
                    <option value="{{$amil->id}}">{{$amil->namaamil}}</option>

                    @endforeach

                </select>
            </div>

        </div>

        <!-- //NOMOR TELEPON -->
        <div class="form-group">
            <label for="inputnomortelepon" class="col-sm-2 control-label input-lg">
                Nomor Telepon
            </label>

            <div class="col-sm-10">
                <input type="number"  name="nomortelepondonatur"  value="{{old('nomortelepondonatur', $data->nomortelepondonatur)}}" class="form-control input-lg" id="nomortelepondonatur" placeholder="08xxxx...">
            </div>

        </div>
        
        <!-- //ALAMAT DONATUR -->
        <div class="form-group">
            <label for="alamatdonatur" class="col-sm-2 control-label input-lg">
                Alamat Donatur
            </label>

            <div class="col-sm-10">
                <input type="text" name="alamatdonatur"  value="{{old('alamatdonatur', $data->alamatdonatur)}}" class="form-control input-lg" id="alamatdonatur" placeholder="Alamat Donatur">
            </div>

        </div>

       
        <!-- //TANGGAL LAHIR DONATUR -->
        <div class="form-group">
            <label for="tanggallahir" class="col-sm-2 control-label input-lg">
                Tanggal Lahir
            </label>

            <div class="col-sm-10">
                <div class="input-group date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text"  name="tanggallahir" id="tanggallahir" value="{{old('tanggallahir', $data->tanggallahir)}}"  class="form-control pull-right" >
                </div>
                <!-- //.input group date -->    
            </div>

        </div>

        <div class="form-group">
            <label for="pekerjaandonatur_id" class="col-sm-2 control-label input-lg">
                Pekerjaan
            </label>

            <div class="col-sm-10">
                <select name="pekerjaandonatur_id"  id="pekerjaandonatur_id" class="form-control input-lg">
                    
                    @foreach($listpekerjaandonatur as $pekerjaandonatur)                    
                    
                        <option value="{{$pekerjaandonatur->id}}">{{$pekerjaandonatur->namapekerjaandonatur}}</option>

                    @endforeach

                </select>
            </div>

        </div>

        <!-- radio -->
        <div class="form-group">

            <label for="jeniskelamindonatur" class="col-sm-2 control-label input-lg">
                Jenis Kelamin
            </label>
            
            <div class="col-sm-10">
                <label class="input-lg">
                    <input type="radio" name="jeniskelamin" value="1" checked> Laki-Laki
                </label>
                <label class="input-lg">
                    <input type="radio" name="jeniskelamin" value="2"> Perempuan
                </label>
                <label class="input-lg">
                    <input type="radio" name="jeniskelamin" value="3"> Tidak Disebutkan
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
    <script>
        //Date picker
        $('#tanggallahir').datepicker({
            
            format : "dd/mm/yyyy",
            setDate : "17/09/1987",
            autoclose: true,
        })
    </script>
    
@endsection
