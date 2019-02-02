<!-- // pekerjaan donatur -->

@extends('master.layout')

<!-- //========== SITE TITLE ======== -->
@section('pagename', 'Data Pekerjaan Donatur')

<!-- //========== MODUL HEADER ========== -->
@section('modulname', 'Pekerjaan Donatur')

@section('modulsection', 'Tampilkan')
@section('modulicon', 'fa fa-list')

<!-- //===========BOX  HEADER =========== -->
@section('boxheader-title', 'Tampilkan Data Pekerjaan Donatur')

@section('boxheader-instruction', 'Hanya data dengan status "aktif" yang muncul saat Tambah Donatur')

<!-- //===========BOX MESSAGE, for ANY ALERT AVAILABLE =========== -->
@section('boxmessage')

    <!--//ambil dari file untuk formatnya   -->
    @include('master/general/boxmessage')
    
@endsection

<!-- //========== BOX CONTENT =========== -->
@section('boxcontent')

<table id="tabeldata" class="table table-bordered table-striped table-hover">
    <thead>
    <tr>
      <th>No.</th>
      <th>Nama Pekerjaan Donatur</th>
      <th>Status</th>
      <th></th>
      <th></th>
    </tr>
    </thead>
    <tbody>


    @if($data->count() > 0)
    
        @foreach ($data as $key=>$item)


        <tr>
            <td>{{ ++$key}}</td>
            <td> {{ $item->namapekerjaandonatur }}</td>
            <td> 
                @if($item->statusaktif)
                    {{ 'Aktif'}}
                @else
                    {{ 'Non Aktif' }}
                @endif
            </td>

            <td><a href="{{url('')}}/pekerjaandonatur/{{ $item->id }}/edit"  data-toggle="tooltip" title="edit data"><i class="fa fa-edit"></i></a></td>
            <td><a href="{{url('')}}/pekerjaandonatur/{{ $item->id }}/delete" data-toggle="tooltip" title="Hapus data"><i class="fa fa-trash"></i></a></td>
        </tr>
       

        @endforeach
    
    @else
        <tr>
            <td colspan="4">
                Maaf Belum Ada Data. Silakan tambah data terlebih dahulu. 
            </td>    
        </tr>

    @endif
    

    </tbody>
</table>



@endsection

<!-- //===========BOX  FOOTER ===========   -->
@section('boxfooter')
        


@endsection

<!-- //===========SCRIPT FOR THE FOOTER  ===========   -->
@section('footer-code')

<script>
    $(function () {
      $('#tabeldata').DataTable({
        'paging'      : true,
        'pageLength'  : 50,  
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false,
        'language'    : {
            "search"    : "Cari Cepat",
            "lengthMenu": "Tampilkan _MENU_ data"
        }
      });
    })
</script>
    
@endsection
