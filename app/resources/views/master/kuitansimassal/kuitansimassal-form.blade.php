<!-- // pekerjaan laporan -->

@extends('master.layout')

<!-- //========== SITE TITLE ======== -->
@section('pagename', 'Cetak Seluruh Kuitansi Per Amil')

<!-- //========== MODUL HEADER ========== -->
@section('modulname', 'Cetak Kuitansi Per Amil')

@section('modulsection', 'Laporan')
@section('modulicon', 'fa fa-bar-chart')

<!-- //===========BOX  HEADER =========== -->
@section('boxheader-title', 'Cetak Kuitansi Amil')

@section('boxheader-instruction', 'Pilih kuitansi yang ingin Anda tampilkan.')


<!-- //===========BOX MESSAGE, for ANY ALERT AVAILABLE =========== -->
@section('boxmessage')

    <!--//ambil dari file untuk formatnya   -->
    @include('master/general/boxmessage')

@endsection


<!-- //========== BOX CONTENT =========== -->
@section('boxcontent')


<p>Laporan ini akan menampilkan Data dari Amil </p>

<!-- form start -->
<form class="form-horizontal" method="POST" action="{{url('')}}/kuitansimassal">
{{@csrf_field()}}

        <!-- //AMil yang bertanggung Jawab -->
        <div class="form-group">
            <label for="amil_id" class="col-sm-2 control-label input-lg">
                Petugas Amil* 
            </label>

            <div class="col-sm-10">
                <select name="amil_id" id="amil_id" class="form-control input-lg">
                    @foreach($listamil as $amil)
                    
                    <option value="{{$amil->id}}">{{$amil->statusaktif == 1 ? "" : "(TIDAK AKTIF!) :: "}} {{$amil->namaamil}}</option>

                    @endforeach
                    
                </select>
            </div>

        </div>



        <!-- // Jenis Transaksi -->
        <div class="form-group">

            <label class="col-sm-2 control-label input-lg">
                Jenis Laporan*
            </label>
            
            <div class="col-sm-10">
                <label class="input-lg">
                    <input type="checkbox" name="istrxdonasi" value="1" checked="checked"> Transaksi Donasi
                </label>
                <label class="input-lg">
                    <input type="checkbox" name="istrxkotakinfaq" value="1"  checked="checked"> Transaksi Kotak Infaq
                </label>
                <label class="input-lg">
                    <input type="checkbox" name="istrxibrankasku" value="1"  checked="checked"> Transaksi iBrankasku
                </label>
            </div>
        </div>


        <!-- //TANGGAL DONASI -->
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

            <label for="jeniskelaminlaporan" class="col-sm-2 control-label input-lg">
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
