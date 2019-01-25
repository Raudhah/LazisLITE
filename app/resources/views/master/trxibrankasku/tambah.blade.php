<!-- // pekerjaan trxibrankasku -->

@extends('master.layout')

@section('headertag')
    <meta name="_token" content="{{csrf_token()}}" />
    
@endsection

<!-- //========== SITE TITLE ======== -->
@section('pagename', 'Tambah iBrankasku')

<!-- //========== MODUL HEADER ========== -->
@section('modulname', 'iBrankasku')

@section('modulsection', 'Tambah')
@section('modulicon', 'fa fa-plus')

<!-- //===========BOX  HEADER =========== -->
@section('boxheader-title', 'Tambah iBrankasku')

@section('boxheader-instruction', 'Isi form berikut. Tanda * wajib diisi. ')

<!-- //===========BOX MESSAGE, for ANY ALERT AVAILABLE =========== -->
@section('boxmessage')

    <!--//ambil dari file untuk formatnya   -->
    @include('master/general/boxmessage')

@endsection


<!-- //========== BOX CONTENT =========== -->
@section('boxcontent')


<!-- form start -->
<form class="form-horizontal" method="POST" action="/trxibrankasku">
{{@csrf_field()}}

        <!-- // DONATURNYA -->
        <div class="form-group">
            <label for="namatrxibrankasku" class="col-sm-2 control-label input-lg">
                Donatur*
            </label>

            <div class="col-sm-10">
                <div id="tombolpilihan">
                    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modal-donatur-cari">
                        <i class="fa fa-search"></i> Cari Donatur
                    </button>

                    atau 

                    <a class="btn btn-success btn-lg" href="/donatur/create" target="_blank">
                        <i class="fa fa-plus"></i> Tambah Donatur Baru
                    </a>
                </div>

                <!-- //ini nanti akan hidden dan muncul jika sudah OK -->
                <div class="row" id="datapilihan">
                    <div class="col-sm-12">
                        <!-- //INI UNTUK KEPERLUAN FORM NYA -->
                        <input type="hidden" name="donatur_id" id="donatur_id" required="required">

                        <!-- //Menampilkan donatur yang dipilih -->
                        <table class="table table-striped">
                            <tr>
                                <th>Nama</th>
                                <td id="detailnamadonatur">N/A</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td id="detailalamatdonatur">N/A</td>
                            </tr>
                            <tr>
                                <th>Nomor Telepon</th>
                                <td id="detailnomortelepondonatur">N/A</td>
                            </tr>
                            <tr>
                                <th></th>
                                <td>
                                    <span id="tomboldetaildonatur">
                                        
                                    </span>

                                    <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modal-donatur-cari">
                                            Ubah Donatur
                                    </button>
                                </td>
                            </tr>
                        </table>

                    </div>
                </div>

            </div>
        </div>




        <!-- //INI ADALAH MODAL CARI DONATUR -->

        <!-- //INI ADALAH MODAL TAMBAH DONATUR SECARA LIVE / BARU -->
        
        <!-- //PERUNTUKAN DONASI -->
        <div class="form-group">
            <label for="peruntukandonasi_id" class="col-sm-2 control-label input-lg">
                Peruntukan Donasi *
            </label>

            <div class="col-sm-10">
                <select name="peruntukandonasi_id"  id="peruntukandonasi_id" class="form-control input-lg">
                    
                    @foreach($listperuntukandonasi as $peruntukandonasi)   
                    
                        @if (old('peruntukandonasi_id') == $peruntukandonasi->id)
                            <option selected="selected" value="{{$peruntukandonasi->id}}">{{$peruntukandonasi->namaperuntukandonasi}}</option>    
                        @else
                            <option value="{{$peruntukandonasi->id}}">{{$peruntukandonasi->namaperuntukandonasi}}</option>
                        @endif
                    
                        

                    @endforeach

                </select>
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
                    
                    @if (old('amil_id') == $amil->id)
                        <option selected="selected" value="{{$amil->id}}">{{$amil->namaamil}}</option>    
                    @else
                        <option value="{{$amil->id}}">{{$amil->namaamil}}</option>
                    @endif

                    

                    @endforeach

                </select>
            </div>

        </div>


        <!-- //TANGGAL DONASI -->
        <div class="form-group">
            <label for="tanggaldonasi" class="col-sm-2 control-label input-lg">
                Tanggal Donasi *
            </label>

            <div class="col-sm-10">
                <div class="input-group date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text"   name="tanggaldonasi" id="tanggaldonasi" value="{{old('tanggaldonasi')}}"  class="form-control pull-right" required="required">
                </div>
                <!-- //.input group date -->    
            </div>

        </div>


        <!-- //DESKRIPSI BARANG -->
        <div class="form-group">
            <label for="deskripsibarang" class="col-sm-2 control-label input-lg">
                Deskripsi barang*
            </label>

            <div class="col-sm-10">
                <textarea rows="5" name="deskripsibarang" class="form-control input-lg" id="deskripsibarang" required="required" placeholder="Masukkan detail barangnya. Bagian ini AKAN tercetak di kuitansi.  ">{{old('deskripsibarang')}}</textarea>
            </div>
        </div>
        
        <!-- //NOMINAL VALUASI -->
        <div class="form-group">
            <label for="nominalvaluasi" class="col-sm-2 control-label input-lg">
                Nominal Valuasi <small>(Bisa diisi nanti)</small>
            </label>

            <div class="col-sm-10">
                <input type="number" name="nominalvaluasi"  value="{{old('nominalvaluasi',0)}}" class="form-control input-lg" id="nominalvaluasi" placeholder="Bagian ini TIDAK TERCETAK di Kuitansi. Dapat diisi nanti (Edit).">
            </div>

        </div>



        <!--// ================================================= -->
        <!--// MODAL CARI DONATUR -->
        <div class="modal modal-primary fade" id="modal-donatur-cari">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Cari Dari Data Donatur yang sudah Ada</h4>
                    </div>

                    <div class="modal-body">
                        <p>Masukkan bagian dari nama / alamat / nomor telepon &hellip;</p>
                            
                            <div class="col-sm-12 form-group">
                                
                                    <input type="text" class="form-control input-lg" id="inputcaridonatur" placeholder="Nama / Alamat / No. Telp.">

                                    <button type="button"  onclick="caridonatur()" class="btn btn-default btn-lg"><i class="fa fa-search"></i>CARI</button>

                            </div>


                            <div class="col-sm-12 form-group">
                                
                                <div id="hasilpencarian">

                                </div>
                            </div>
                                
                    </div>

                    <div class="modal-footer">
                        <div class="col-sm-10 form-group">
                                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tutup</button>    
                        </div>
                        
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal MODAL CARI DONATUR-->

        <div class="col-sm-2">
            </div>
    
            <div class="col-sm-10">
                <button type="reset" class="btn btn-default btn-lg">Batal</button>
                <button type="submit" class="btn btn-info btn-lg">Tambah Data</button>
            </div>
        
        </form>
        <!-- /form -->


@endsection

<!-- //===========BOX  FOOTER ===========   -->
@section('boxfooter')
        



@endsection

<!-- //===========SCRIPT FOR THE FOOTER  ===========   -->
@section('footer-code')
    <script>

        var GLOBALDATA = [];

        //inisialisasi dulu
        $('#datapilihan').hide();



        //Date picker
        $('#tanggaldonasi').datepicker({
            
            format : "dd/mm/yyyy",
            defaultDate : new Date(),
            autoclose: true,
        })


        //jika dalam teks pencarian, ENTER di tekan, apa yang terjadi.. 
        $("#inputcaridonatur").keypress(function(event) {
            if (event.which == 13) {
                event.preventDefault();
                caridonatur();
            }
        });


        function caridonatur(){
            //setup ajax
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });

            //mendapatkan string/text query pencariannya 
            var inputcaridonatur = $("#inputcaridonatur").val();

            $.ajax({

                type:'POST',
     
                url:'/donatur/ajaxsearch',
     
                data:{function:'searchdonatur', query: inputcaridonatur},
     
                success:function(data){
                   //alert('berhasil dapatnya');

                   //success ajaxnya kah?
                   console.log(data.success);
                   if(data.ketemu == 1){
                        console.log('Alhamdulillah data ditemukan');
                        console.log(data.data);
                        //tampilkan hasil pencarian ke user
                        displaySearchResult(data.data);
                   }
                   else{
                        $("#hasilpencarian").html('<span class="alert alert-danger">Maaf, data dengan kata <em><strong> \"' + inputcaridonatur+" \"</strong></em>yang dicari tidak ada...</span>");
                        console.log('Maaf tidak ditemukan data tersebut');
                   }
                   
                   
                },
                error:function(error){
                    console.log(error);
                    //alert('Error 701 : gagal mendapatkan data pencarian donatur dari server');
                }
     
             });
        }

        //menampilkan data hasil pencarian apabila sukses ditemukan sesuai dengan query
        function displaySearchResult(data){
            //alert("bersiap menampilkan datanya");
            //kosongkan dulu isinya
            $("#hasilpencarian").html(""); 
            var tekshasilpencarian = "";
            tekshasilpencarian += '<table class="table">';
            tekshasilpencarian += "<thead>";
            tekshasilpencarian += "<tr>";
            tekshasilpencarian += "<td>Nama</td><td>Alamat</td><td>No.Telepon</td><td></td>";
            tekshasilpencarian += "</tr>";
            tekshasilpencarian += "</thead>";
            tekshasilpencarian += "<tbody>";
            for(var i=0; i < data.length; i++){

                tekshasilpencarian += "<tr>";
                tekshasilpencarian += '<td><span id="nama'+data[i].id+'">' + data[i].namadonatur + "</span></td>";
                if(data[i].alamatdonatur != null){
                    tekshasilpencarian += "<td>" + data[i].alamatdonatur + "</td>";
                }
                else{
                    tekshasilpencarian += "<td>" + 'N/A' + "</td>";
                }
                
                if(data[i].nomortelepondonatur != null){
                    tekshasilpencarian += "<td>" + data[i].nomortelepondonatur + "</td>";
                }
                else{
                    tekshasilpencarian += "<td>" + 'N/A' + "</td>";
                }         

                tekshasilpencarian += '<td><a class="btn btn-success" data-dismiss="modal" aria-label="Close"';
                tekshasilpencarian += ' onclick="pilihdonatur('+ data[i].id+')">';
                tekshasilpencarian += 'Pilih</a></td>';     

                tekshasilpencarian += "</tr>";
            }
            tekshasilpencarian += "</tbody>";
            tekshasilpencarian += "</table>";

            var inidatanya = "Ini data hasil pencariannya : " + data;

            $("#hasilpencarian").html(tekshasilpencarian); 

            GLOBALDATA = data;

        }

        function pilihdonatur(iddonatur){
            //alert("Sebenarnya ini tu dipanggila apa ndak ya?");
            console.log("Donatur terpilih " + iddonatur);
            console.log("isi GLOBALDATA ");
            console.log(GLOBALDATA);
            
            var data = GLOBALDATA;

            for(var i=0; i < data.length; i++){
                if(data[i].id == iddonatur){
                    //tampilkan di formnya yuk disini
                    console.log("DETAIL DONATUR TERPILIH : ");
                    console.log("NAMA  " + data[i].namadonatur );
                    console.log("ALAMAT  " + data[i].alamatdonatur );
                    console.log("NOMOR TELEPON  " + data[i].nomortelepondonatur );
                    console.log("AMIL  " + data[i].amil_id );

                    //menampilkan datanya
                    $("#datapilihan").show(500);

                    $("#detailnamadonatur").html(data[i].namadonatur);
                    $("#detailalamatdonatur").html(data[i].alamatdonatur);
                    $("#detailnomortelepondonatur").html(data[i].nomortelepondonatur);
                    
                    //ini isi form hidden
                    $("#donatur_id").val(data[i].id);


                    //set amil pada nilainya
                    $("#amil_id").val(data[i].amil_id);
                    
                    //membuat tombol klik untuk detail donatur, buka di window baru
                    var tekslinkdetail = '<a href="/donatur/' + data[i].id+ '" target="_blank" class="btn btn-primary btn-xs"> Detail Donatur </a>'
                    $("#tomboldetaildonatur").html(tekslinkdetail);

                    //mari memilih petugas Amil yang sesuai dengan ini

                    //menyembunyikan tombol
                    $("#tombolpilihan").hide(500);

                }
            }
        }

    </script>
    
@endsection
