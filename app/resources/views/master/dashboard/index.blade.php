<!-- // dashboard -->

@extends('master.layout')

<!-- //========== SITE TITLE ======== -->
@section('pagename', 'Data Dashboard')

<!-- //========== MODUL HEADER ========== -->
@section('modulname', 'Dashboard')

@section('modulsection', 'Tampilkan')
@section('modulicon', 'fa fa-list')

<!-- //===========BOX  HEADER =========== -->
@section('boxheader-title')

    Assalammualaikum {{Auth::user()->name}}

@endsection

@section('boxheader-instruction')
<?php
        echo "Semoga Berkah pada Hari Ini :"; 
        $today = date("d/m/Y"); 
        echo $today;  
    ?>
@endsection

<!-- //===========BOX MESSAGE, for ANY ALERT AVAILABLE =========== -->
@section('boxmessage')

@endsection

<!-- //========== BOX CONTENT =========== -->
@section('boxcontent')

    <div class="row">
    

        @foreach ($smallboxes as $smallbox)
            


            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box {{$smallbox["bg"]}}">
                <div class="inner">
                    <h3>{{number_format($smallbox["number"],0,',','.')}}</h3>

                    <p>{{$smallbox["text"]}}</p>
                </div>
                <div class="icon">
                    <i class="fa {{$smallbox["icon"]}}"></i>
                </div>
                <a href="{{$smallbox["url"]}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

        @endforeach

    </div>  
    <!-- end div row -->



    <div class="row">
        <div class="col-md-6">
                <!-- PRODUCT LIST -->
                <div class="box box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title">10 Donatur Rutin Terbaru</h3>
      
                    <div class="box-tools pull-right">
                      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <ul class="products-list product-list-in-box">

                        @foreach ($listdonaturrutinterbaru as $key=>$donatur)
                            
                        

                      <li class="item">
                        <div class="product-info">
                            
                          <a href="donatur/{{$donatur->id}}" class="product-title">
                            {{++$key}}.
                            {{$donatur->namadonatur}}
                            <span class="label label-warning pull-right">Detail</span></a>
                          <span class="product-description">
                                
                              </span>
                        </div>
                      </li>

                      @endforeach
                      
                      <!-- /.item -->
                    </ul>
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer text-center">
                    <a href="donatur" class="uppercase">Lihat Seluruhnya</a>
                  </div>
                  <!-- /.box-footer -->
                </div>
                <!-- /.box -->


        </div>

        <div class="col-md-6">
                <!-- PRODUCT LIST -->
                <div class="box box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title">10 Kotak Infaq Terbaru</h3>
      
                    <div class="box-tools pull-right">
                      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <ul class="products-list product-list-in-box">

                        @foreach ($listkotakinfaqterbaru as $key=>$donatur)
                            
                        

                      <li class="item">
                        <div class="product-info">
                            
                          <a href="donatur/{{$donatur->id}}" class="product-title">
                            {{++$key}}.
                            {{$donatur->namadonatur}}
                            <span class="label label-warning pull-right">Detail</span></a>
                          <span class="product-description">
                                
                              </span>
                        </div>
                      </li>

                      @endforeach
                      
                      <!-- /.item -->
                    </ul>
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer text-center">
                    <a href="donatur" class="uppercase">Lihat Seluruhnya</a>
                  </div>
                  <!-- /.box-footer -->
                </div>
                <!-- /.box -->


        </div>


    </div>

@endsection



<!-- //===========BOX  FOOTER ===========   -->
@section('boxfooter')

@endsection

<!-- //===========SCRIPT FOR THE FOOTER  ===========   -->
@section('footer-code')


    
@endsection
