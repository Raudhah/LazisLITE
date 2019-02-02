<!-- // pekerjaan donatur -->

@extends('master.layout')

<!-- //========== SITE TITLE ======== -->
@section('pagename', 'Ganti Password')

<!-- //========== MODUL HEADER ========== -->
@section('modulname', 'User')

@section('modulsection', 'Edit')
@section('modulicon', 'fa fa-plus')

<!-- //===========BOX  HEADER =========== -->
@section('boxheader-title', 'Ganti Password')

@section('boxheader-instruction', 'Isi form berikut. Password yang barus tidak boleh sama dengan password yang lama')

<!-- //===========BOX MESSAGE, for ANY ALERT AVAILABLE =========== -->
@section('boxmessage')

    <!--//ambil dari file untuk formatnya   -->
    @include('master/general/boxmessage')

@endsection


<!-- //========== BOX CONTENT =========== -->
@section('boxcontent')


<!-- form start -->
<form class="form-horizontal" method="POST" action="{{url('')}}/user/gantipassword">
{{@csrf_field()}}

        <div class="form-group">
            <label for="passwordlama" class="col-sm-2 control-label input-lg">
                Password Lama *
            </label>

            <div class="col-sm-10">
                <input type="password" class="form-control input-lg" name="passwordlama" value="" id="passwordlama" placeholder="Password yang sekarang" required>
            </div>
        </div>

        <div class="form-group">
            <label for="passwordbaru" class="col-sm-2 control-label input-lg">
                Password Baru *
            </label>

            <div class="col-sm-10">
                <input type="password" class="form-control input-lg" name="passwordbaru" id="passwordbaru" placeholder="Password Baru" required>
            </div>
        </div>

        <div class="form-group">
            <label for="passwordbaruconfirm" class="col-sm-2 control-label input-lg">
                Password Baru (konfirmasi)*
            </label>

            <div class="col-sm-10">
                <input type="password" class="form-control input-lg" name="passwordbaruconfirm" value="" id="passwordbaruconfirm" placeholder="Konfirmasi Password Baru" required>
            </div>
        </div>



@endsection

<!-- //===========BOX  FOOTER ===========   -->
@section('boxfooter')
        
        <div class="col-sm-2">
        </div>

        <div class="col-sm-10">
            <button type="reset" class="btn btn-default btn-lg">Batal</button>
            <button type="submit" class="btn btn-info btn-lg">Update Password</button>
        </div>
    
    </form>
    <!-- /form -->


@endsection

<!-- //===========SCRIPT FOR THE FOOTER  ===========   -->
@section('footer-code')
    
@endsection
