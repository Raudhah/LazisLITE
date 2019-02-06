<!-- // pekerjaan donatur -->

@extends('master.layout')

<!-- //========== SITE TITLE ======== -->
@section('pagename', 'Tambah User')

<!-- //========== MODUL HEADER ========== -->
@section('modulname', 'User')

@section('modulsection', 'Tambah')
@section('modulicon', 'fa fa-plus')

<!-- //===========BOX  HEADER =========== -->
@section('boxheader-title', 'Tambah User')

@section('boxheader-instruction', 'Isi form berikut. Tanda * wajib diisi. Hanya User yang aktif akan muncul saat Transaksi')

<!-- //===========BOX MESSAGE, for ANY ALERT AVAILABLE =========== -->
@section('boxmessage')

    <!--//ambil dari file untuk formatnya   -->
    @include('master/general/boxmessage')

@endsection


<!-- //========== BOX CONTENT =========== -->
@section('boxcontent')


<!-- form start -->
<form class="form-horizontal" method="POST" action="{{url('')}}/user">
{{@csrf_field()}}


        <div class="form-group">
            <label for="name" class="col-sm-2 control-label input-lg">
                Nama User
            </label>

            <div class="col-sm-10">
                <input type="text" class="form-control input-lg" name="name" value="{{old('name')}}" id="name" placeholder="Nama User" required>
            </div>

        </div>

        <div class="form-group">
            <label for="email" class="col-sm-2 control-label input-lg">
                Email User* (untuk login)
            </label>

            <div class="col-sm-10">
                <input type="email" class="form-control input-lg" name="email" value="{{old('email')}}" id="email" placeholder="sesuatu@blabla.com">
            </div>
        </div>

        <div class="form-group">
            <label for="levelakses" class="col-sm-2 control-label input-lg">
                Level Akses
            </label>

            <div class="col-sm-10">
                    <select name="levelakses" id="levelakses"  class="form-control input-lg"  required>
                            <option value="1" {{(old('levelakses') == 1? "selected":"")}}>Admin Harian</option>
                            <option value="2" {{(old('levelakses') == 2? "selected":"")}}>Super Admin</option>
                    </select>
            </div>
        </div>

        <div class="form-group">
                <label for="password" class="col-sm-2 control-label input-lg">
                    Password
                </label>
    
                <div class="col-sm-10">
                    <input type="password" class="form-control input-lg" name="password" value="{{old('password')}}" id="password" placeholder="Password">
                </div>
        </div>

        <div class="form-group">
                <label for="password_confirmation" class="col-sm-2 control-label input-lg">
                   Konfirmasi Password
                </label>
    
                <div class="col-sm-10">
                    <input type="password" class="form-control input-lg" name="password_confirmation" id="password_confirmation" placeholder="Password Lagi">
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
