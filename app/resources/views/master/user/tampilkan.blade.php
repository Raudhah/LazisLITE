<!-- // amil -->

@extends('master.layout')

<!-- //========== SITE TITLE ======== -->
@section('pagename', 'Data User')

<!-- //========== MODUL HEADER ========== -->
@section('modulname', 'User')

@section('modulsection', 'Tampilkan')
@section('modulicon', 'fa fa-list')

<!-- //===========BOX  HEADER =========== -->
@section('boxheader-title', 'Tampilkan Data User')

@section('boxheader-instruction', 'Hanya User terkait yang dapat Mengganti Password dirinya')

<!-- //===========BOX MESSAGE, for ANY ALERT AVAILABLE =========== -->
@section('boxmessage')

    <!--//ambil dari file untuk formatnya   -->
    @include('master/general/boxmessage')
    
@endsection

<!-- //========== BOX CONTENT =========== -->
@section('boxcontent')

<table id="tabeldata" class="table table-bordered table-striped">
    <thead>
    <tr>
      <th>No.</th>
      <th>Nama User</th>
      <th>Level Akses</th>
      <th>Reset</th>
      <th>Keterangan    </th>
    </tr>
    </thead>
    <tbody>


    @if($data->count() > 0)
    
        @foreach ($data as $key=>$item)


        <tr>
            <td>{{ ++$key}}</td>
            <td> {{ $item->namaamil }}</td>
            <td> {{ $item->alamatamil }}</td>
            <td> {{ $item->nomorteleponamil }}</td>
            <td> 
                @if($item->statusaktif)
                    {{ 'Aktif'}}
                @else
                    {{ 'Non Aktif' }}
                @endif
            </td>

            <td><a href="/amil/{{ $item->id }}/edit"  data-toggle="tooltip" title="edit data"><i class="fa fa-edit"></i></a></td>
            <td><a href="/amil/{{ $item->id }}/delete" data-toggle="tooltip" title="Hapus data"><i class="fa fa-trash"></i></a></td>
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
