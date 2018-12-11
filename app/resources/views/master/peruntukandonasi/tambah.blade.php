<!-- // peruntukan donasi -->

@extends('master.layout')

<!-- //========== SITE TITLE ======== -->
@section('pagename', 'Tambah Peruntukan Donasi yaa')

<!-- //========== MODUL HEADER ========== -->
@section('modulname', 'Peruntukan Donasi')

@section('modulsection', 'Tambah')
@section('modulicon', 'fa fa-inbox')

<!-- //===========BOX  HEADER =========== -->
@section('boxheader-title', 'Tambah Peruntukan Donasi')

@section('boxheader-instruction', 'Isi form berikut. Tanda * wajib diisi')


<!-- //========== BOX CONTENT =========== -->
@section('boxcontent')

<!-- form start -->
<form class="form-horizontal">

        <div class="form-group">
            <label for="inputnamadonatur" class="col-sm-2 control-label input-lg">
                Nama Peruntukan Donasi *
            </label>

            <div class="col-sm-10">
                <input type="text" class="form-control input-lg" id="inputnamapekerjaandonatur" placeholder="Nama Peruntukan Donasi (misal : zakat, wakaf, program yatim, program Pondok Lansia, )">
            </div>

        </div>

@endsection

<!-- //===========BOX  FOOTER ===========   -->
@section('boxfooter')
        
        <div class="col-sm-2">
        </div>

        <div class="col-sm-10">
            <button type="submit" class="btn btn-default btn-lg">Batal</button>
            <button type="submit" class="btn btn-info btn-lg">Tambah Data</button>
        </div>
    
    </form>
    <!-- /form -->


@endsection

<!-- //===========SCRIPT FOR THE FOOTER  ===========   -->
@section('footer-code')
    
@endsection
