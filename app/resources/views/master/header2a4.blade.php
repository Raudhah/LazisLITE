


  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('js/bower_components/bootstrap/dist/css/bootstrap.min.css') }} ">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('js/bower_components/font-awesome/css/font-awesome.min.css') }} ">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('js/bower_components/Ionicons/css/ionicons.min.css') }} ">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('js/dist/css/AdminLTE.min.css') }} ">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('js/dist/css/skins/_all-skins.min.css') }} ">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{asset('js/bower_components/morris.js/morris.css') }} ">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{asset('js/bower_components/jvectormap/jquery-jvectormap.css') }} ">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{asset('js/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }} ">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('js/bower_components/bootstrap-daterangepicker/daterangepicker.css') }} ">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('js/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }} ">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{asset('js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }} ">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <style>
      @page { margin: 0 }
      body { margin: 0 }
      .sheet {
        margin: 0;
        overflow: hidden;
        position: relative;
        box-sizing: border-box;
        page-break-after: always;
      }
      
      /** Paper sizes **/
      body.A3               .sheet { width: 297mm; height: 419mm }
      body.A3.landscape     .sheet { width: 420mm; height: 296mm }
      body.A4               .sheet { width: 210mm; }
      body.F4               .sheet { width: 210mm;}
      body.A4.landscape     .sheet { width: 297mm; height: 209mm }
      body.A5               .sheet { width: 148mm; height: 209mm }
      body.A5.landscape     .sheet { width: 210mm; height: 147mm }
      body.letter           .sheet { width: 216mm; height: 279mm }
      body.letter.landscape .sheet { width: 280mm; height: 215mm }
      body.legal            .sheet { width: 216mm; height: 356mm }
      body.legal.landscape  .sheet { width: 357mm; height: 215mm }
      
      /** Padding area **/
      .sheet.padding-2mm { padding: 2mm }
      .sheet.padding-5mm { padding: 5mm }
      .sheet.padding-10mm { padding: 10mm }
      .sheet.padding-15mm { padding: 15mm }
      .sheet.padding-20mm { padding: 20mm }
      .sheet.padding-25mm { padding: 25mm }

      /** kuitansi **/
      .kuitansi{
        height: 73mm;
        width: 201mm;
        border: 0px solid green;
        margin-left: 5mm;
        margin-top: 5mm;
        margin-bottom: 5mm;
        margin-right: 3mm;
        line-height: 14px;
        float:left;
        overflow:hidden;
      }

      /** KOLOM KIRI**/

      .kuitansi .kiri{
        width: 136mm;
        height: 67mm;
        float: left;
        border-top-color: red;
        border-top-style: solid;
        border-top-width: 3mm;
      }

      .kiri .header{
        overflow:hidden;
        box-sizing: border-box;
        position: relative;
      }

      .kuitansi .kiri .header .logolaz{
        width:25mm;
        text-align: right;
        float: left;
      }

      .kuitansi .kiri .header .datalaz{
        width:125mm;
        margin: 0px;
      }

      .kuitansi .kiri .logolaz img{
        height:16mm;
      }

      .kiri .isikuitansi{
        text-align: center;
      }

      .kiri .isikuitansi h4{
        margin: 0px;
        margin-top: 5mm;
      }

      .kiri .isikuitansi table{
        margin-left:2mm;
        margin-bottom:0px;
        font-size: 14px; 
      }

      .kiri .isikuitansi table thead th{ 
        text-align:center;
        padding: 0px;
      }

      .kiri .isikuitansi table tbody td{ 
        text-align:center;
        padding: 0px;
      }

      

      /** KOLOM KANAN **/
      .kuitansi .kanan{
        width: 65mm;
        float: left;
        border-top-color: green;
        border-top-style: solid;
        border-top-width: 3mm;
      }

      .pagebreak{
        page-break-after: always;
      }

      .bawahkuitansi{
        text-align:center; 
        font-size:12px; 
        font-weight:bold; 
        font-style:italic; 
        line-height: 12px;
        height: 12mm;
        overflow:hidden;
        color: #000 !important;
      }

      .bawahkuitansi .garnish{
        border-top-right-radius: 50px 20px;
        background-color: red !important;
        height: 3mm;
        width: 160mm;
        float: left;
      }

      .bawahkuitansi .urlweb{
        font-size:12px;
      }
      
      
      /** For screen preview **/
      @media screen {
        body {
          -webkit-print-color-adjust: exact !important;
        }

        body { background: #e0e0e0 }
        .sheet {
          background: white;
          box-shadow: 0 .5mm 2mm rgba(0,0,0,.3);
          margin: 5mm auto;
        }

        .bgblue {
          background-color: #337ab7 !important;
          color : #fff !important;
        }

      }
      
      /** Fix for Chrome issue #273306 **/
      @media print {
                 body.A3.landscape { width: 420mm }
        body.A3, body.A4.landscape { width: 297mm }
        body.A4, body.A5.landscape { width: 210mm }
        body.A5                    { width: 148mm }
        body.letter, body.legal    { width: 216mm }
        body.letter.landscape      { width: 280mm }
        body.legal.landscape       { width: 357mm }
        body.F4               .sheet { width: 210mm;}

        body {
          -webkit-print-color-adjust: exact !important;
        }

        .bgblue {
          background-color: #337ab7 !important;
          color : #fff !important;
        }


        * {
          -webkit-print-color-adjust: exact !important; /*Chrome, Safari */
          color-adjust: exact !important;  /*Firefox*/
        }

        .pagebreak{
          display: block;
          page-break-after: always;
        }
      }



      
      
  </style>
</head>

<body class="F4">