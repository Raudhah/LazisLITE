<!-- // pekerjaan laporan -->

@extends('master.layout')

<!-- //========== SITE TITLE ======== -->
@section('pagename', 'Laporan Rekap Per Peruntukan Donasi')

<!-- //========== MODUL HEADER ========== -->
@section('modulname', 'Laporan Rekap Per Peruntukan Donasi')

@section('modulsection', 'Laporan')
@section('modulicon', 'fa fa-bar-chart')

<!-- //===========BOX  HEADER =========== -->
@section('boxheader-title', 'Laporan Peruntukan Donasi')

@section('boxheader-instruction', 'Pilih laporan yang ingin Anda tampilkan.')


<!-- //===========BOX MESSAGE, for ANY ALERT AVAILABLE =========== -->
@section('boxmessage')

    <!--//ambil dari file untuk formatnya   -->
    @include('master/general/boxmessage')

@endsection


<!-- //========== BOX CONTENT =========== -->
@section('boxcontent')


<p>Laporan ini akan menampilkan Data dari Peruntukan Donasi </p>

<!-- form start -->
<form class="form-horizontal" method="POST" action="/laporan/peruntukandonasi">
{{@csrf_field()}}
    

        <!-- //JENIS LAPORAN -->
        <div class="form-group">

            <label for="tipelaporan" class="col-sm-2 control-label input-lg">
                Tipe Laporan
            </label>
            
            <div class="col-sm-10">
                <div class="row input-lg">
                    <div class="col-sm-12">
                        <input type="radio" name="tipelaporan" id="tipelaporansemua" value="1">Semua Peruntukan Donasi
                    </div>
                    <div class="col-sm-12">
                        <input type="radio" name="tipelaporan" id="tipelaporansemua" value="2">Hanya Peruntukan Donasi Aktif
                    </div>



                </div>
            </div>
        </div>


        <!-- //PERIODE LAPORAN -->
        <div class="form-group">
            <label for="periodelaporan" class="col-sm-2 control-label input-lg">
                Periode Laporan
            </label>

            <div class="col-sm-10">
                <div class="input-group date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input required="required" type="text"  name="periodelaporan" id="periodelaporan" value="{{old('periodelaporan')}}"  class="form-control pull-right">
                </div>
                <!-- //.input group date -->    
            </div>

        </div>


        <!-- //RADIO URUTKAN BERDASARKAN -->
        <div class="form-group">

            <label for="sortby" class="col-sm-2 control-label input-lg">
                Urutkan Berdasarkan
            </label>
            
            <div class="col-sm-10">
                <label class="input-lg">
                    <input type="radio" name="sortby" value="1" checked> Tanggal (Terbaru)
                </label>
                <label class="input-lg">
                    <input type="radio" name="sortby" value="2"> Tanggal (Terlama)
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
            <button type="submit" class="btn btn-info btn-lg">Tampilkan Laporan</button>
        </div>
    
    </form> 
    <!-- /form -->


@endsection

<!-- //===========SCRIPT FOR THE FOOTER  ===========   -->
@section('footer-code')
    <script>

        //Date picker
        $('#periodelaporan').daterangepicker({
            
            format : "dd/mm/yyyy",
            locale: {
                format: 'DD/MM/YYYY' // --------Here
            },
            autoclose: true,
            allowEmpty:true,
        })

        $('#periodelaporan').val('');


    </script>
    
@endsection
