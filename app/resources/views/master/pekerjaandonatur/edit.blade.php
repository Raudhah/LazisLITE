<!-- // pekerjaan donatur -->

@extends('master.layout')

<!-- //========== SITE TITLE ======== -->
@section('pagename', 'Edit Pekerjaan Donatur')

<!-- //========== MODUL HEADER ========== -->
@section('modulname', 'Pekerjaan Donatur')

@section('modulsection', 'Edit')
@section('modulicon', 'fa fa-pencil')

<!-- //===========BOX  HEADER =========== -->
@section('boxheader-title', 'Edit Pekerjaan Donatur')

@section('boxheader-instruction', 'Edit form berikut. Tanda * wajib diisi')

<!-- //===========BOX MESSAGE, for ANY ALERT AVAILABLE =========== -->
@section('boxmessage')

    <!--//ambil dari file untuk formatnya   -->
    @include('master/general/boxmessage')
    
@endsection


<!-- //========== BOX CONTENT =========== -->
@section('boxcontent')

<!-- form start -->
<form class="form-horizontal" method="POST" action="{{url('')}}/pekerjaandonatur/{{$data->id}}">
{{@csrf_field()}}
{{method_field('PATCH')}}

        <div class="form-group">
            <label for="namapekerjaandonatur" class="col-sm-2 control-label input-lg">
                Nama Pekerjaan Donatur *
            </label>

            <div class="col-sm-10">
                <input type="text" class="form-control input-lg" name="namapekerjaandonatur" id="namapekerjaandonatur" placeholder="Nama Pekerjaan Donatur (misal : zakat, wakaf, program yatim, program Pondok Lansia, )" value="{{$data->namapekerjaandonatur}}" required>
            </div>

        </div>

        <div class="form-group">
            <label for="statusaktif" class="col-sm-2 control-label input-lg">
                Status Aktif
            </label>

            <div class="col-sm-10">

                    <?php 
                        $aktif = $nonaktif = "";
                    ?>

                    @if ($data->statusaktif)
                        <?php $aktif = "checked" ?>
                    @else
                        <?php $nonaktif = "checked"; ?>
                    @endif

                    <label class="input-lg">
                        <input type="radio" name="statusaktif" {{$aktif}} value="1"> Aktif 
                    </label>
                    <label class="input-lg">
                        <input type="radio" name="statusaktif" {{$nonaktif}} value='0'> Non-Aktif
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
            <button type="submit" class="btn btn-info btn-lg">UPDATE Data</button>
        </div>
    
    </form>
    <!-- /form -->


@endsection

<!-- //===========SCRIPT FOR THE FOOTER  ===========   -->
@section('footer-code')
    
@endsection
