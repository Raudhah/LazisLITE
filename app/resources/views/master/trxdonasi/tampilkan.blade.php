<!-- // donasi -->

@extends('master.layout')

<!-- //========== SITE TITLE ======== -->
@section('pagename', 'Data Donasi')

<!-- //========== MODUL HEADER ========== -->
@section('modulname', 'Donasi')

@section('modulsection', 'Tampilkan')
@section('modulicon', 'fa fa-list')

<!-- //===========BOX  HEADER =========== -->
@section('boxheader-title', 'Tampilkan Data Donasi')

@section('boxheader-instruction')

    Klik Pada tanda <i class="fa fa-print"></i> Untuk Mencetak Kuitansi atau Lihat Data lebih detail

@endsection
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
      <th>Kuitansi</th>
      <th>Tanggal</th>
      <th>Donatur</th>
      <th>Amil</th>
      <th>Jumlah Total</th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
    </tr>
    </thead>
    <tbody>


    @if($data->count() > 0)
    
        @foreach ($data as $key=>$item)


        <tr>
            <td>{{ ++$key}}</td>
            <td> {{config('app.kodekuitansi.trxdonasi')}}{{ $item->id }}</td>
            <td> {{ $item->tanggaldonasi }}</td>
            <td> {{ $item->donatur->namadonatur }}</td>
            <td> {{ $item->amil->namaamil }}</td>
            <td class="pull-right"> {{ number_format($item->jumlahtotal,0,',','.') }}</td>
            <td class="text-center">
                <a href="{{url('')}}/trxdonasi/{{ $item->id }}/print"  data-toggle="tooltip" title="Cetak Kuitansi (Periode saja)"><i class="fa fa-print"></i></a>
                <a href="{{url('')}}/trxdonasi/{{ $item->id }}/print/2"  data-toggle="tooltip" title="Cetak Kuitansi (Tanggal dd/mm/yyyy)"><i class="fa fa-print text-green"></i></a>
                <a href="{{url('')}}/trxdonasi/{{ $item->id }}/print/3"  data-toggle="tooltip" title="Cetak Kuitansi (Tanggal dan Periode)"><i class="fa fa-print text-yellow"></i></a>
            </td>
            <td class="text-center"><a href="{{url('')}}/trxdonasi/{{ $item->id }}"  data-toggle="tooltip" title="Detail"><i class="fa fa-search"></i></a></td>
            <td class="text-center"><a href="{{url('')}}/trxdonasi/{{ $item->id }}/edit"  data-toggle="tooltip" title="edit data"><i class="fa fa-edit"></i></a></td>
            <td class="text-center"><a href="{{url('')}}/trxdonasi/{{ $item->id }}/delete" data-toggle="tooltip" title="Hapus data"><i class="fa fa-trash"></i></a></td>
        </tr>
       

        @endforeach
    
    @else
        <tr>
            <td colspan="10">
                Maaf, Data tidak ditemukan... 
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
