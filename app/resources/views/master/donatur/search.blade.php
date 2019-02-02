<!-- // pekerjaan donatur -->

@extends('master.layout')

<!-- //========== SITE TITLE ======== -->
@section('pagename', 'Cari Donatur')

<!-- //========== MODUL HEADER ========== -->
@section('modulname', 'Donatur')

@section('modulsection', 'Cari')
@section('modulicon', 'fa fa-search')

<!-- //===========BOX  HEADER =========== -->
@section('boxheader-title', 'Cari Data Donatur berdasarkan kriteria berikut')

@section('boxheader-instruction', 'Silakan isi pada bagian yang ingin dicari. Kosongi / Biarkan pada bagian yang tidak menjadi kriteria pencarian')

<!-- //===========BOX MESSAGE, for ANY ALERT AVAILABLE =========== -->
@section('boxmessage')

    <!--//ambil dari file untuk formatnya   -->
    @include('master/general/boxmessage')

@endsection


<!-- //========== BOX CONTENT =========== -->
@section('boxcontent')


<!-- form start -->
<form class="form-horizontal" method="POST" action="{{url('')}}/donatur/search">
{{@csrf_field()}}

        <!-- // Nama Donatur -->
        <div class="form-group">
            <label for="namadonatur" class="col-sm-2 control-label input-lg">
                Mengandung Nama...
            </label>

            <div class="col-sm-10">
                <input type="text" class="form-control input-lg" name="namadonatur" value="" id="namadonatur" placeholder="Nama Donatur">
            </div>
        </div>

        <!-- // Jenis Donatur -->
        <div class="form-group">

            <label class="col-sm-2 control-label input-lg">
                Jenis Donatur*
            </label>
            
            <div class="col-sm-10">
                <label class="input-lg">
                    <input type="checkbox" name="isdonaturrutin" value="1"> Donatur Rutin
                </label>
                <label class="input-lg">
                    <input type="checkbox" name="iskotakinfaq" value="1"> Kotak Infaq
                </label>
                <label class="input-lg">
                    <input type="checkbox" name="isdonaturinsidental" value="1"> Donatur Insidental
                </label>
            </div>
        </div>


        <!-- //AMil yang bertanggung Jawab -->
        <div class="form-group">
            <label for="amil_id" class="col-sm-2 control-label input-lg">
                Ditangani Amil...   <small>Tekan Ctrl + Klik untuk memilih beberapa</small>
            </label>

            <div class="col-sm-10">
                <select name="amil_id[]" id="amil_id" class="form-control input-lg"  size="6" multiple>

                    @foreach($listamil as $amil)
                    
                    <option value="{{$amil->id}}" selected="selected">{{$amil->statusaktif == 1 ? "" : "(TIDAK AKTIF!) :: "}} {{$amil->namaamil}}</option>

                    @endforeach

                </select>

                <br/>
                <button type="button" id="pilihamilsemua" class="btn btn-sm btn-success no-padding">Pilih semua</button> - 
                <button type="button" id="lepasamilsemua" class="btn btn-sm btn-warning  no-padding">Lepas Semua</button> 
            </div>

        </div>

        <!-- //NOMOR TELEPON -->
        <div class="form-group">
            <label for="inputnomortelepon" class="col-sm-2 control-label input-lg">
                Nomor Telepon Mengandung...
            </label>

            <div class="col-sm-10">
                <input type="text"  name="nomortelepondonatur"  value="" class="form-control input-lg" id="nomortelepondonatur" placeholder="08xxxx...">
            </div>

        </div>
        
        <!-- //ALAMAT DONATUR -->
        <div class="form-group">

            <label for="alamatdonatur" class="col-sm-2 control-label input-lg">
                Alamat di Sekitar...
            </label>

            <div class="col-sm-10">
                <input type="text" name="alamatdonatur"  value="" class="form-control input-lg" id="alamatdonatur" placeholder="Alamat Donatur">
            </div>

        </div>

       
        <!-- //TANGGAL LAHIR DONATUR -->
        <div class="form-group">
            <label for="tanggallahir" class="col-sm-2 control-label input-lg">
                Lahir Antara...
            </label>

            <div class="col-sm-10">
                <div class="input-group date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text"  name="tanggallahir" id="tanggallahir" value=""  class="form-control pull-right" >
                </div>
                <!-- //.input group date -->    
            </div>

        </div>

        <div class="form-group">
            <label for="pekerjaandonatur_id" class="col-sm-2 control-label input-lg">
                Pekerjaan
                <small>Tekan Ctrl + Klik untuk memilih beberapa</small>
            </label>

            <div class="col-sm-10">
                <select name="pekerjaandonatur_id[]"  id="pekerjaandonatur_id" class="form-control input-lg" size="6" multiple>
                    
                    @foreach($listpekerjaandonatur as $pekerjaandonatur)                    
                    
                        <option value="{{$pekerjaandonatur->id}}" selected="selected" > {{$pekerjaandonatur->statusaktif == 1 ? "" : "(TIDAK AKTIF!) :: "}} {{$pekerjaandonatur->namapekerjaandonatur}}</option>

                    @endforeach

                </select>

                <br/>
                <button type="button" id="pilihpekerjaansemua" class="btn btn-sm btn-success no-padding">Pilih semua</button> - 
                <button type="button" id="lepaspekerjaansemua" class="btn btn-sm btn-warning  no-padding">Lepas Semua</button> 
            </div>

        </div>

        <!-- radio -->
        <div class="form-group">

            <label for="jeniskelamindonatur" class="col-sm-2 control-label input-lg">
                Jenis Kelamin
            </label>
            
            <div class="col-sm-10">
                <label class="input-lg">
                    <input type="radio" name="jeniskelamin" value="0" checked> Semua Jenis Kelamin
                </label>
                <label class="input-lg">
                    <input type="radio" name="jeniskelamin" value="1" > Laki-Laki
                </label>
                <label class="input-lg">
                    <input type="radio" name="jeniskelamin" value="2" > Perempuan
                </label>
                <label class="input-lg">
                    <input type="radio" name="jeniskelamin" value="3" > Tidak Disebutkan
                </label>
            </div>
        </div>

@endsection

<!-- //===========BOX  FOOTER ===========   -->
@section('boxfooter')
        
        <div class="col-sm-2">
        </div>

        <div class="col-sm-10">
            <button type="reset" class="btn btn-default btn-lg">Reset</button>
            <button type="submit" class="btn btn-info btn-lg">Cari Data</button>
        </div>
    
    </form>
    <!-- /form -->


@endsection

<!-- //===========SCRIPT FOR THE FOOTER  ===========   -->
@section('footer-code')
    <script>
        //Date picker
        $('#tanggallahir').daterangepicker({
            
            format : "dd/mm/yyyy",
            locale: {
                format: 'DD/MM/YYYY' // --------Here
            },
            autoclose: true,
            allowEmpty:true,
        })
        //emptying the daterangepicker on init
        $('#tanggallahir').val('');

        $('#pilihamilsemua').click(function(){
            $('#amil_id option').prop('selected', true);
        });

        $('#lepasamilsemua').click(function(){
            $('#amil_id option').prop('selected', false);
        });

        $('#pilihpekerjaansemua').click(function(){
            $('#pekerjaandonatur_id option').prop('selected', true);
        });

        $('#lepaspekerjaansemua').click(function(){
            $('#pekerjaandonatur_id option').prop('selected', false);
        });

    </script>
    
@endsection
