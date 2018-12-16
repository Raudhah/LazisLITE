<!-- // peruntukan donasi -->

@extends('master.layout')

<!-- //========== SITE TITLE ======== -->
@section('pagename', 'Data Peruntukan Donasi')

<!-- //========== MODUL HEADER ========== -->
@section('modulname', 'Peruntukan Donasi')

@section('modulsection', 'Tampilkan')
@section('modulicon', 'fa fa-inbox')

<!-- //===========BOX  HEADER =========== -->
@section('boxheader-title', 'Tampilkan Data Peruntukan Donasi')

@section('boxheader-instruction', 'Hanya data dengan status "aktif" yang muncul saat transaksi')

<!-- //===========BOX MESSAGE, for ANY ALERT AVAILABLE =========== -->
@section('boxmessage')

    <?php if(!empty($message)){ ?>
        @if ($message['show'])

            <div class="alert alert-{{$message['type']}} alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{$message['content']}}
            </div>
            
        @else
            <h1>ndak ada message ini...</h1> 
        @endif
    
    <?php } ?>
    


    
@endsection

<!-- //========== BOX CONTENT =========== -->
@section('boxcontent')

<table id="example2" class="table table-bordered table-striped table-hover">
    <thead>
    <tr>
      <th>No.</th>
      <th>Nama Peruntukan Donasi</th>
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
            <td> {{ $item->namaperuntukandonasi }}</td>
            <td> 
                @if($item->statusaktif)
                    {{ 'Aktif'}}
                @else
                    {{ 'Non Aktif' }}
                @endif
            </td>

            <td><a href="/peruntukandonasi/{{ $item->id }}/edit"  data-toggle="tooltip" title="edit data"><i class="fa fa-edit"></i></a></td>
            <td><a href="/peruntukandonasi/{{ $item->id }}/delete" data-toggle="tooltip" title="Hapus data"><i class="fa fa-trash"></i></a></td>
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
    
@endsection
