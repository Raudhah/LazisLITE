<?php

namespace App\Http\Controllers;

use App\Trxibrankasku;
//dependency relations untuk modelnya
use App\Amil;
use App\peruntukandonasi;
use App\Donatur;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;    

class TrxibrankaskuController extends Controller
{


    public $vrule_donatur_id = 'required|numeric|min:0';
    public $vrule_amil_id = 'required|numeric|min:0';
    public $vrule_peruntukandonasi_id = 'required|numeric|min:0';

    public $vrule_tanggaldonasi = 'required|dateformat:d/m/Y';
   

    public $vrule_nominalvaluasi = 'sometimes|numeric|min:0';
    public $vrule_deskripsibarang = 'required|min:3';


    public function __construct(){
        $this->middleware('auth');
    }
    
    /** DONE
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = \App\Trxibrankasku::select('id','donatur_id','tanggaldonasi', 'deskripsibarang', 'nominalvaluasi')
                                    ->with(['donatur'])
                                    ->orderBy('id', 'desc')
                                    ->take('500')
                                    ->get();

        
        // dd($data);
        return view('master/trxibrankasku/tampilkan', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //ambil data peruntukandonasi buat ditampilkan di List Optionnya
        $listperuntukandonasi = \App\peruntukandonasi::where('statusaktif','=','1')
                                              ->orderBy('namaperuntukandonasi','asc')
                                              ->take('500')
                                              ->get();

        //ambil data list amil buat ditampilkan di list Optionnya
        $listamil = \App\Amil::where('statusaktif','=','1')
                                ->orderBy('namaamil','asc')
                                ->take('500')
                                ->get();

        return view('master/trxibrankasku/tambah', compact('listperuntukandonasi', 'listamil'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //validasi data dulu nggih
         //cek dulu apakah data nya valid ataukah tidak. 
         $validdata = request()->validate([
            'donatur_id' => $this->vrule_donatur_id,
            'amil_id' => $this->vrule_amil_id,
            'peruntukandonasi_id' => $this->vrule_peruntukandonasi_id,
            'tanggaldonasi' => $this->vrule_tanggaldonasi,
            'nominalvaluasi' => $this->vrule_nominalvaluasi,
            'deskripsibarang' => $this->vrule_deskripsibarang,
        ]);

        //untuk nantinya ditampilkan dalam alert boxnya
        $donatur_id = request('donatur_id');
        //dapatkan namadonaturnya

        $datadonatur =  \App\Donatur::find($donatur_id);
        $namadonatur = $datadonatur->namadonatur;

        // dd(compact('donatur_id', 'datadonatur', 'namadonatur'));
        
        //menambahkan datanya
        $status = Trxibrankasku::create($validdata);
        

        if($status){
            //menampilkan kuitansinya loh ya, bukan listnya lagi....
            //preparing data
            $deskripsibarang = request('deskripsibarang'); 
            $nominalvaluasi = request('nominalvaluasi'); 
            $tanggaldonasi = request('tanggaldonasi'); 
            $dataamil = \App\Amil::find(request('amil_id')); 
            $dataperuntukandonasi = \App\peruntukandonasi::find(request('peruntukandonasi_id')); 

            //id yang terakhir disimpan ini
            $idtransaksi = $status->id;

            //konfig untuk data tampilannya utamanya
            $konfig = \App\Konfigurasi::first();
            
            //buat message nya
            $message = [
                'show'  => '1',
                'type' => 'success',
                'content' => 'Alhamdulillah, Transaksi "'.$deskripsibarang.'" berhasil disimpan!',
                ];
    
            // tampilkan KUITANSINYA BRO
            return view('master/trxibrankasku/kuitansi', compact('idtransaksi','konfig','datadonatur', 'tanggaldonasi','nominalvaluasi', 'deskripsibarang', 'dataamil', 'dataperuntukandonasi', 'message'));
        }
        else{
            return dd('Uups! Error, data gagal masuk ke dalam database');
        }
        dd($status);
        



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Trxibrankasku  $trxibrankasku
     * @return \Illuminate\Http\Response
     */
    public function show(Trxibrankasku $trxibrankasku)
    {

        $idtransaksi = $trxibrankasku->id;
        $tanggaldonasi = $trxibrankasku->tanggaldonasi;
        $deskripsibarang = $trxibrankasku->deskripsibarang;
        $nominalvaluasi = $trxibrankasku->nominalvaluasi;

        //dapatkan data amil
        $dataamil = $trxibrankasku->amil;

        //dapatkan data donatur
        $datadonatur = $trxibrankasku->donatur;

        //dapatkan data peruntukan donasi
        $dataperuntukandonasi = $trxibrankasku->peruntukandonasi;

        $message = "";

       
        // tampilkan KUITANSINYA BRO
        return view('master/trxibrankasku/detail', compact('idtransaksi','datadonatur', 'tanggaldonasi','nominalvaluasi', 'deskripsibarang', 'dataamil', 'dataperuntukandonasi', 'message'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Trxibrankasku  $trxibrankasku
     * @return \Illuminate\Http\Response
     */
    public function showKuitansi(Trxibrankasku $trxibrankasku, $formattanggal=1)
    {

        $idtransaksi = $trxibrankasku->id;
        $tanggaldonasi = $trxibrankasku->tanggaldonasi;
        $deskripsibarang = $trxibrankasku->deskripsibarang;
        $nominalvaluasi = $trxibrankasku->nominalvaluasi;

        //dapatkan data amil
        $dataamil = $trxibrankasku->amil;

        //dapatkan data donatur
        $datadonatur = $trxibrankasku->donatur;

        //dapatkan data peruntukan donasi
        $dataperuntukandonasi = $trxibrankasku->peruntukandonasi;

        $message = "";

        //konfig untuk data tampilannya utamanya
        $konfig = \App\Konfigurasi::first();

    
        return view('master/trxibrankasku/kuitansi-print', compact('idtransaksi','konfig','datadonatur', 'tanggaldonasi','nominalvaluasi', 'deskripsibarang', 'dataamil', 'dataperuntukandonasi', 'message', 'formattanggal'));
    }

    /**
     * Display the specified resource into PDF.
     *
     * @param  \App\Trxibrankasku  $trxibrankasku
     * @return \Illuminate\Http\Response
     */
    public function showKuitansiPdf(Trxibrankasku $trxibrankasku)
    {

        $idtransaksi = $trxibrankasku->id;
        $tanggaldonasi = $trxibrankasku->tanggaldonasi;
        $deskripsibarang = $trxibrankasku->deskripsibarang;
        $nominalvaluasi = $trxibrankasku->nominalvaluasi;

        //dapatkan data amil
        $dataamil = $trxibrankasku->amil;

        //dapatkan data donatur
        $datadonatur = $trxibrankasku->donatur;

        //dapatkan data peruntukan donasi
        $dataperuntukandonasi = $trxibrankasku->peruntukandonasi;

        $message = "";

        //konfig untuk data tampilannya utamanya
        $konfig = \App\Konfigurasi::first();

        //$pdf = PDF::loadView('master.trxibrankasku.kuitansi', compact('idtransaksi','konfig','datadonatur', 'tanggaldonasi','nominalvaluasi', 'deskripsibarang', 'dataamil', 'dataperuntukandonasi', 'message'));
        // return $pdf->download('invoice.pdf');

        $data = [
            'foo' => 'bar'
        ];
        $pdf = PDF::loadView('master/pdf/pdf1', compact('idtransaksi','konfig','datadonatur', 'tanggaldonasi','nominalvaluasi', 'deskripsibarang', 'dataamil', 'dataperuntukandonasi', 'message'));
        return $pdf->stream('document.pdf');
    
        // return view('master/trxibrankasku/kuitansi-print', compact('idtransaksi','konfig','datadonatur', 'tanggaldonasi','nominalvaluasi', 'deskripsibarang', 'dataamil', 'dataperuntukandonasi', 'message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Trxibrankasku  $trxibrankasku
     * @return \Illuminate\Http\Response
     */
    public function edit(Trxibrankasku $trxibrankasku)
    {
        //populating untuk select dlsb... 

        //ambil data peruntukandonasi buat ditampilkan di List Optionnya
        $listperuntukandonasi = \App\peruntukandonasi::orderBy('namaperuntukandonasi','asc')
                                                    ->take('500')
                                                    ->get();

        //ambil data list amil buat ditampilkan di list Optionnya
        $listamil = \App\Amil::orderBy('namaamil','asc')
                                ->take('500')
                                ->get();


        //data transaksi adalah ya trx ibrankasku itu
        $data = $trxibrankasku;
        $datadonatur = $trxibrankasku->donatur;
       
        // tampilkan KUITANSINYA BRO
        return view('master/trxibrankasku/edit', compact('data', 'datadonatur','listamil', 'listperuntukandonasi'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Trxibrankasku  $trxibrankasku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trxibrankasku $trxibrankasku)
    {
         //cek dulu apakah data nya valid ataukah tidak. 
         $validdata = request()->validate([
            'donatur_id' => $this->vrule_donatur_id,
            'amil_id' => $this->vrule_amil_id,
            'peruntukandonasi_id' => $this->vrule_peruntukandonasi_id,
            'tanggaldonasi' => $this->vrule_tanggaldonasi,
            'nominalvaluasi' => $this->vrule_nominalvaluasi,
            'deskripsibarang' => $this->vrule_deskripsibarang,
        ]);


        //UPDATE DATA DULU GAES
        $trxibrankasku->donatur_id = $request->donatur_id;
        $trxibrankasku->amil_id = $request->amil_id;
        $trxibrankasku->peruntukandonasi_id = $request->peruntukandonasi_id;
        $trxibrankasku->tanggaldonasi = $request->tanggaldonasi;
        $trxibrankasku->nominalvaluasi = $request->nominalvaluasi;
        $trxibrankasku->deskripsibarang = $request->deskripsibarang;

        //SIMPAN YUK
        $status = $trxibrankasku->save();

        if($status){
            //menampilkan kuitansinya loh ya, bukan listnya lagi....
            //preparing data
            $deskripsibarang = request('deskripsibarang'); 
            
            $nominalvaluasi = request('nominalvaluasi'); 
            $tanggaldonasi = request('tanggaldonasi'); 
            $dataamil = $trxibrankasku->amil; 
            $dataperuntukandonasi = $trxibrankasku->peruntukandonasi;
            $datadonatur = $trxibrankasku->donatur; 

            //id yang terakhir disimpan ini
            $idtransaksi = $trxibrankasku->id;

            //konfig untuk data tampilannya utamanya
            $konfig = \App\Konfigurasi::first();
            
            //buat message nya
            $message = [
                'show'  => '1',
                'type' => 'success',
                'content' => 'Alhamdulillah, Transaksi "'.$deskripsibarang.'" berhasil diUpdate!',
                ];
    
            // tampilkan KUITANSINYA BRO
            return view('master/trxibrankasku/kuitansi', compact('idtransaksi','konfig','datadonatur', 'tanggaldonasi','nominalvaluasi', 'deskripsibarang', 'dataamil', 'dataperuntukandonasi', 'message'));
        }
        else{
            return dd('Uups! Error, data gagal masuk ke dalam database');
        }
        dd($status);


    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Trxibrankasku  $trxibrankasku
     * @return \Illuminate\Http\Response
     */
    public function delete(Trxibrankasku $trxibrankasku)
    {

        $idtransaksi = $trxibrankasku->id;
        $tanggaldonasi = $trxibrankasku->tanggaldonasi;
        $deskripsibarang = $trxibrankasku->deskripsibarang;
        $nominalvaluasi = $trxibrankasku->nominalvaluasi;

        //dapatkan data amil
        $dataamil = $trxibrankasku->amil;

        //dapatkan data donatur
        $datadonatur = $trxibrankasku->donatur;

        //dapatkan data peruntukan donasi
        $dataperuntukandonasi = $trxibrankasku->peruntukandonasi;

        $message = "";

       
        // tampilkan KUITANSINYA BRO
        return view('master/trxibrankasku/delete', compact('idtransaksi','datadonatur', 'tanggaldonasi','nominalvaluasi', 'deskripsibarang', 'dataamil', 'dataperuntukandonasi', 'message'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Trxibrankasku  $trxibrankasku
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trxibrankasku $trxibrankasku)
    {
        //kompilasi buat messagenya sebelum kehapus
        $namadonatur = $trxibrankasku->donatur->namadonatur;
        $tanggaldonasi = $trxibrankasku->tanggaldonasi;
        $deskripsibarang = $trxibrankasku->deskripsibarang;
        $nominalvaluasi = $trxibrankasku->nominalvaluasi;

        $messagecontent = 'Transaksi iBrankasku atas nama "'.$namadonatur.'" Pada tanggal: -"'.$tanggaldonasi.'"- senilai -"'.number_format($nominalvaluasi,0,',','.').'"- ('.$deskripsibarang.' ) BERHASIL DIHAPUS';

         //buat message nya
         $message = [
            'show'  => '1',
            'type' => 'success',
            'content' => $messagecontent,
            ];

        $status = $trxibrankasku->delete();

        if($status){
            $data = \App\Trxibrankasku::select('id','donatur_id','tanggaldonasi', 'deskripsibarang', 'nominalvaluasi')
                                        ->with(['donatur'])
                                        ->orderBy('id', 'desc')
                                        ->take('500')
                                        ->get();


            // dd($data);
            return view('master/trxibrankasku/tampilkan', compact('data', 'message'));
        }
        else{
            return dd('Uups! Error, data gagal masuk ke dalam database');
        }

        dd($status);
    }


    /**
     * Show the form for searching the specified resource.
     *
     * @param  \App\Trxibrankasku  $trxibrankasku
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
            //ambil data peruntukandonasi buat ditampilkan di List Optionnya
        $listperuntukandonasi = \App\peruntukandonasi::orderBy('namaperuntukandonasi','asc')
                                                    ->take('500')
                                                    ->get();

        //ambil data list amil buat ditampilkan di list Optionnya
        $listamil = \App\Amil::orderBy('namaamil','asc')
                                ->take('500')
                                ->get();
       
        // tampilkan FORM CARINYA BRO
        return view('master/trxibrankasku/search', compact('listamil', 'listperuntukandonasi'));
    }


    /**
     * Show the form for displaying search result of the specified resource.
     *
     * @param  \App\Trxibrankasku  $trxibrankasku
     * @return \Illuminate\Http\Response
     */

     public function searchResult(Request $request){
        //dapatkan semua isinya dahulu

        // dd($request->all());

        $deskripsibarang = $request->deskripsibarang;
        $nominalvaluasiawal = $request->nominalvaluasiawal;
        $nominalvaluasiakhir = $request->nominalvaluasiakhir;

        //dapatkan tanggal donasi dan memisahkannya (-)
        $tanggaldonasiantara = $request->tanggaldonasi;

       


        //dapatkan list amil dan list peruntukandonasi (BENTUK ARRAY)
        $listamil = $request->amil_id;
        $listperuntukandonasi = $request->peruntukandonasi_id;

        //semua donatur
        $donatur_id = $request->donatur_id;
        $semuadonatur = $request->checkboxsemuadonatur; //null jika tidak diisi, //1 jika di check

        //SEKARANG MEMBUAT QUERY-NYA YAA.. 
        $data = \App\Trxibrankasku::select('id','donatur_id','tanggaldonasi', 'deskripsibarang', 'nominalvaluasi')
                                    ->with(['donatur'])
                                    //when amil_id
                                    ->when($request->amil_id != null, function($query) use ($listamil){
                                        return $query->whereIn('amil_id', $listamil);
                                    })
                                    //when peruntukandonasi_id
                                    ->when($request->peruntukandonasi_id != null, function($query) use ($listperuntukandonasi){
                                        return $query->whereIn('peruntukandonasi_id', $listperuntukandonasi);
                                    })
                                    //when deskripsibarang
                                    ->when($request->deskripsibarang != null, function($query) use ($deskripsibarang){
                                        // dd("Deskripsi barang mengandung : ".$deskripsibarang);
                                        return $query->where('deskripsibarang', 'like', '%'.$deskripsibarang.'%');
                                    })
                                    //when nominalvaluasi
                                    ->when($nominalvaluasiawal != null && $nominalvaluasiakhir !=null, function($query) use ($nominalvaluasiawal, $nominalvaluasiakhir){
                                        return $query->whereBetween('nominalvaluasi', [$nominalvaluasiawal, $nominalvaluasiakhir]);
                                    })
                                    //when tanggaldonasi
                                    ->when($tanggaldonasiantara != null, function($query) use ($tanggaldonasiantara){
                                       // dd($tanggaldonasiawal.' hingga '.$tanggaldonasiakhir);

                                        $tanggaldonasiarray = explode("-", $tanggaldonasiantara);
                                        //hapus spasi
                                        $tanggaldonasiawal = trim($tanggaldonasiarray[0]);
                                        $tanggaldonasiakhir = trim($tanggaldonasiarray[1]);

                                        $tanggaldonasiawal = Carbon::createFromFormat('d/m/Y', $tanggaldonasiawal)->toDateString();
                                        $tanggaldonasiakhir = Carbon::createFromFormat('d/m/Y', $tanggaldonasiakhir)->toDateString();

                                        return $query->whereBetween('tanggaldonasi', [$tanggaldonasiawal, $tanggaldonasiakhir]);
                                    })
                                    //when donatur id
                                    ->when($donatur_id != null && $donatur_id > 0, function($query) use ($donatur_id){
                                        
                                        return $query->where('donatur_id', $donatur_id);
                                    })
                                    
                                    ->orderBy('id', 'desc')
                                    ->take('500')
                                    ->get();

        
        // dd($data);
        return view('master/trxibrankasku/tampilkan', compact('data'));

         dd($request->all());
     }


}
