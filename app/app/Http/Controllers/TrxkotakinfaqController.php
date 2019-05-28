<?php

namespace App\Http\Controllers;

use App\Trxkotakinfaq;
//dependency relations untuk modelnya
use App\Amil;
use App\Donatur;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TrxkotakinfaqController extends Controller
{


    public $vrule_donatur_id = 'required|numeric|min:0';
    public $vrule_amil_id = 'required|numeric|min:0';

    public $vrule_tanggaldonasi = 'required|dateformat:d/m/Y';

    public $vrule_jumlahtotal = 'sometimes|numeric|min:0';
    public $vrule_keterangan = 'sometimes|nullable|string|min:3';


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
        $data = \App\Trxkotakinfaq::select('id','donatur_id','amil_id','tanggaldonasi', 'keterangan', 'jumlahtotal')
                                    ->with(['donatur'])
                                    ->with(['amil'])
                                    ->orderBy('id', 'desc')
                                    ->take('500')
                                    ->get();

        
        // dd($data);
        return view('master/trxkotakinfaq/tampilkan', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //ambil data list amil buat ditampilkan di list Optionnya
        $listamil = \App\Amil::where('statusaktif','=','1')
                                ->orderBy('namaamil','asc')
                                ->take('500')
                                ->get();

        return view('master/trxkotakinfaq/tambah', compact('listamil'));
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
            'tanggaldonasi' => $this->vrule_tanggaldonasi,
            'jumlahtotal' => $this->vrule_jumlahtotal,
            'keterangan' => $this->vrule_keterangan,
        ]);

        //untuk nantinya ditampilkan dalam alert boxnya
        $donatur_id = request('donatur_id');
        //dapatkan namadonaturnya

        $datadonatur =  \App\Donatur::find($donatur_id);
        $namadonatur = $datadonatur->namadonatur;

        // dd(compact('donatur_id', 'datadonatur', 'namadonatur'));
        
        //menambahkan datanya
        $status = Trxkotakinfaq::create($validdata);

        if($status){
            //menampilkan kuitansinya loh ya, bukan listnya lagi....
            //preparing data
            $keterangan = request('keterangan'); 
            $jumlahtotal = request('jumlahtotal'); 
            $tanggaldonasi = request('tanggaldonasi'); 
            $dataamil = \App\Amil::find(request('amil_id')); 

            //id yang terakhir disimpan ini
            $idtransaksi = $status->id;

            //konfig untuk data tampilannya utamanya
            $konfig = \App\Konfigurasi::first();
            
            //buat message nya
            $message = [
                'show'  => '1',
                'type' => 'success',
                'content' => 'Alhamdulillah, Transaksi Kotak Infaq dari "'.$namadonatur.'" Sejumlah: '.number_format($jumlahtotal,0,',','.').' - "'.$keterangan.'" berhasil disimpan!',
                ];
    
            // tampilkan KUITANSINYA BRO
            return view('master/trxkotakinfaq/kuitansi', compact('idtransaksi','konfig','datadonatur', 'tanggaldonasi','jumlahtotal', 'keterangan', 'dataamil', 'message'));
        }
        else{
            return dd('Uups! Error, data gagal masuk ke dalam database');
        }
        dd($status);
        



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Trxkotakinfaq  $trxkotakinfaq
     * @return \Illuminate\Http\Response
     */
    public function show(Trxkotakinfaq $trxkotakinfaq)
    {

        $idtransaksi = $trxkotakinfaq->id;
        $tanggaldonasi = $trxkotakinfaq->tanggaldonasi;
        $keterangan = $trxkotakinfaq->keterangan;
        $jumlahtotal = $trxkotakinfaq->jumlahtotal;

        //dapatkan data amil
        $dataamil = $trxkotakinfaq->amil;

        //dapatkan data donatur
        $datadonatur = $trxkotakinfaq->donatur;

        //konfig untuk data tampilannya utamanya
        $konfig = \App\Konfigurasi::first();

        $message = "";

       
        // tampilkan KUITANSINYA BRO
        return view('master/trxkotakinfaq/detail', compact('idtransaksi','konfig','datadonatur', 'tanggaldonasi','jumlahtotal', 'keterangan', 'dataamil', 'message'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Trxkotakinfaq  $trxkotakinfaq
     * @return \Illuminate\Http\Response
     */
    public function showKuitansi(Trxkotakinfaq $trxkotakinfaq, $formattanggal=1)
    {

        $idtransaksi = $trxkotakinfaq->id;
        $tanggaldonasi = $trxkotakinfaq->tanggaldonasi;
        $keterangan = $trxkotakinfaq->keterangan;
        $jumlahtotal = $trxkotakinfaq->jumlahtotal;

        //dapatkan data amil
        $dataamil = $trxkotakinfaq->amil;

        //dapatkan data donatur
        $datadonatur = $trxkotakinfaq->donatur;

        //konfig untuk data tampilannya utamanya
        $konfig = \App\Konfigurasi::first();

        $message = "";

        // dd($datadonatur);

        // tampilkan KUITANSINYA BRO
        return view('master/trxkotakinfaq/kuitansi-print', compact('idtransaksi','konfig','datadonatur', 'tanggaldonasi','jumlahtotal', 'keterangan', 'dataamil', 'message', 'formattanggal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Trxkotakinfaq  $trxkotakinfaq
     * @return \Illuminate\Http\Response
     */
    public function edit(Trxkotakinfaq $trxkotakinfaq)
    {
        //populating untuk select dlsb... 

        //ambil data list amil buat ditampilkan di list Optionnya
        $listamil = \App\Amil::orderBy('namaamil','asc')
                                ->take('500')
                                ->get();


        //data transaksi adalah ya trx kotakinfaq itu
        $data = $trxkotakinfaq;
        $datadonatur = $trxkotakinfaq->donatur;
       
        // tampilkan KUITANSINYA BRO
        return view('master/trxkotakinfaq/edit', compact('data', 'datadonatur','listamil'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Trxkotakinfaq  $trxkotakinfaq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trxkotakinfaq $trxkotakinfaq)
    {
         //cek dulu apakah data nya valid ataukah tidak. 
         $validdata = request()->validate([
            'donatur_id' => $this->vrule_donatur_id,
            'amil_id' => $this->vrule_amil_id,
            'tanggaldonasi' => $this->vrule_tanggaldonasi,
            'jumlahtotal' => $this->vrule_jumlahtotal,
            'keterangan' => $this->vrule_keterangan,
        ]);


        //UPDATE DATA DULU GAES
        $trxkotakinfaq->donatur_id = $request->donatur_id;
        $trxkotakinfaq->amil_id = $request->amil_id;
        $trxkotakinfaq->tanggaldonasi = $request->tanggaldonasi;
        $trxkotakinfaq->jumlahtotal = $request->jumlahtotal;
        $trxkotakinfaq->keterangan = $request->keterangan;

        //SIMPAN YUK
        $status = $trxkotakinfaq->save();

        if($status){
            //menampilkan kuitansinya loh ya, bukan listnya lagi....
            //preparing data
            $keterangan = request('keterangan'); 
            
            $jumlahtotal = request('jumlahtotal'); 
            $tanggaldonasi = request('tanggaldonasi'); 
            $dataamil = $trxkotakinfaq->amil; 
            $datadonatur = $trxkotakinfaq->donatur; 

            //id yang terakhir disimpan ini
            $idtransaksi = $trxkotakinfaq->id;

            //konfig untuk data tampilannya utamanya
            $konfig = \App\Konfigurasi::first();
            
            //buat message nya
            $message = [
                'show'  => '1',
                'type' => 'success',
                'content' => 'Alhamdulillah, Transaksi Kotak Infaq Sejumlah "'.number_format($jumlahtotal,0,',','.').'" - "'.$keterangan.'" berhasil diUpdate!',
                ];
    
            // tampilkan KUITANSINYA BRO
            return view('master/trxkotakinfaq/kuitansi', compact('idtransaksi','konfig','datadonatur', 'tanggaldonasi','jumlahtotal', 'keterangan', 'dataamil', 'message'));
        }
        else{
            return dd('Uups! Error, data gagal masuk ke dalam database');
        }
        dd($status);


    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Trxkotakinfaq  $trxkotakinfaq
     * @return \Illuminate\Http\Response
     */
    public function delete(Trxkotakinfaq $trxkotakinfaq)
    {

        $idtransaksi = $trxkotakinfaq->id;
        $tanggaldonasi = $trxkotakinfaq->tanggaldonasi;
        $keterangan = $trxkotakinfaq->keterangan;
        $jumlahtotal = $trxkotakinfaq->jumlahtotal;

        //dapatkan data amil
        $dataamil = $trxkotakinfaq->amil;

        //dapatkan data donatur
        $datadonatur = $trxkotakinfaq->donatur;


        $message = "";

       
        // tampilkan KUITANSINYA BRO
        return view('master/trxkotakinfaq/delete', compact('idtransaksi','datadonatur', 'tanggaldonasi','jumlahtotal', 'keterangan', 'dataamil', 'message'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Trxkotakinfaq  $trxkotakinfaq
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trxkotakinfaq $trxkotakinfaq)
    {
        //kompilasi buat messagenya sebelum kehapus
        $namadonatur = $trxkotakinfaq->donatur->namadonatur;
        $tanggaldonasi = $trxkotakinfaq->tanggaldonasi;
        $keterangan = $trxkotakinfaq->keterangan;
        $jumlahtotal = $trxkotakinfaq->jumlahtotal;

        $messagecontent = 'Transaksi Kotak Infaq atas nama "'.$namadonatur.'" Pada tanggal: -"'.$tanggaldonasi.'"- senilai -"'.number_format($jumlahtotal,0,',','.').'"- ('.$keterangan.' ) BERHASIL DIHAPUS';

         //buat message nya
         $message = [
            'show'  => '1',
            'type' => 'success',
            'content' => $messagecontent,
            ];

        $status = $trxkotakinfaq->delete();

        if($status){
            $data = \App\Trxkotakinfaq::select('id','donatur_id','amil_id','tanggaldonasi', 'keterangan', 'jumlahtotal')
                                        ->with(['donatur'])
                                        ->with(['amil'])
                                        ->orderBy('id', 'desc')
                                        ->take('500')
                                        ->get();


            // dd($data);
            return view('master/trxkotakinfaq/tampilkan', compact('data', 'message'));
        }
        else{
            return dd('Uups! Error, data gagal masuk ke dalam database');
        }

        dd($status);
    }


    /**
     * Show the form for searching the specified resource.
     *
     * @param  \App\Trxkotakinfaq  $trxkotakinfaq
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        //ambil data list amil buat ditampilkan di list Optionnya
        $listamil = \App\Amil::orderBy('namaamil','asc')
                                ->take('500')
                                ->get();
       
        // tampilkan FORM CARINYA BRO
        return view('master/trxkotakinfaq/search', compact('listamil'));
    }


    /**
     * Show the form for displaying search result of the specified resource.
     *
     * @param  \App\Trxkotakinfaq  $trxkotakinfaq
     * @return \Illuminate\Http\Response
     */

     public function searchResult(Request $request){
        //dapatkan semua isinya dahulu

        // dd($request->all());

        $keterangan = $request->keterangan;
        $jumlahtotalawal = $request->jumlahtotalawal;
        $jumlahtotalakhir = $request->jumlahtotalakhir;

        //dapatkan tanggal donasi dan memisahkannya (-)
        $tanggaldonasiantara = $request->tanggaldonasi;

        //dapatkan list amil (BENTUK ARRAY)
        $listamil = $request->amil_id;


        //semua donatur
        $donatur_id = $request->donatur_id;
        $semuadonatur = $request->checkboxsemuadonatur; //null jika tidak diisi, //1 jika di check

        //SEKARANG MEMBUAT QUERY-NYA YAA.. 
        $data = \App\Trxkotakinfaq::select('id','donatur_id','amil_id','tanggaldonasi', 'keterangan', 'jumlahtotal')
                                    ->with(['donatur'])
                                    ->with(['amil'])
                                    //when amil_id
                                    ->when($request->amil_id != null, function($query) use ($listamil){
                                        return $query->whereIn('amil_id', $listamil);
                                    })
                                    //when keterangan
                                    ->when($request->keterangan != null, function($query) use ($keterangan){
                                        //  dd("Deskripsi pencarian mengandung : ".$keterangan);
                                        return $query->where('keterangan', 'like', '%'.$keterangan.'%');
                                    })
                                    //when jumlahtotal
                                    ->when($jumlahtotalawal != null && $jumlahtotalakhir !=null, function($query) use ($jumlahtotalawal, $jumlahtotalakhir){
                                        return $query->whereBetween('jumlahtotal', [$jumlahtotalawal, $jumlahtotalakhir]);
                                    })
                                    //when tanggaldonasi
                                    ->when($tanggaldonasiantara != null, function($query) use ($tanggaldonasiantara){

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
        return view('master/trxkotakinfaq/tampilkan', compact('data'));

         dd($request->all());
     }


}
