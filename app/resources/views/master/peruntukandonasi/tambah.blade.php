<!-- // peruntukan donasi -->

@extends('master.layout')

<!-- //========== SITE TITLE ======== -->
@section('pagename', 'Tambah Peruntukan Donasi yaa')

<!-- //========== MODUL HEADER ========== -->
@section('modulname', 'Peruntukan Donasi')

@section('modulsection', 'Tambah')
@section('modulicon', 'fa fa-plus')

<!-- //===========BOX  HEADER =========== -->
@section('boxheader-title', 'Tambah Peruntukan Donasi')

@section('boxheader-instruction', 'Isi form berikut. Tanda * wajib diisi')

<!-- //===========BOX MESSAGE, for ANY ALERT AVAILABLE =========== -->
@section('boxmessage')

    <!--//ambil dari file untuk formatnya   -->
    @include('master/general/boxmessage')
    
@endsection


<!-- //========== BOX CONTENT =========== -->
@section('boxcontent')


<!-- form start -->
<form class="form-horizontal" method="POST" action="{{url('')}}/peruntukandonasi">
{{@csrf_field()}}


        <div class="form-group">
            <label for="namaperuntukandonasi" class="col-sm-2 control-label input-lg">
                Nama Peruntukan Donasi *
            </label>

            <div class="col-sm-10">
                <input type="text" class="form-control input-lg" name="namaperuntukandonasi" value="{{old('namaperuntukandonasi')}}" id="namaperuntukandonasi" placeholder="Nama Peruntukan Donasi (misal : zakat, wakaf, program yatim, program Pondok Lansia, )" required>
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
