<?php

namespace App\Http\Controllers;

use App\Trxdonasi;
//dependency relations untuk modelnya
use App\Amil;
use App\peruntukandonasi;
use App\Donatur;
use App\Trxdonasidetail;
use App\Konfigurasi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TrxdonasiController extends Controller
{


    public $vrule_donatur_id = 'required|numeric|min:0';
    public $vrule_amil_id = 'required|numeric|min:0';


    public $vrule_tanggaldonasi = 'required|dateformat:d/m/Y';
    public $vrule_insidentil = 'required|boolean';

    public $vrule_jumlahtotal = 'required|numeric';
    public $vrule_keterangan = 'nullable|sometimes|string|min:3';


    /** DONE
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = \App\Trxdonasi::select('id','donatur_id','amil_id','tanggaldonasi', 'keterangan', 'jumlahtotal')
                                    ->with(['donatur'])
                                    ->with(['amil'])
                                    ->orderBy('id', 'desc')
                                    ->take('500')
                                    ->get();

        
        // dd($data);
        return view('master/trxdonasi/tampilkan', compact('data'));
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

        return view('master/trxdonasi/tambah', compact('listperuntukandonasi', 'listamil'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->insidentil);
       
        //validasi data dulu nggih
         //cek dulu apakah data nya valid ataukah tidak. 
         $validdata = request()->validate([
            'donatur_id' => $this->vrule_donatur_id,
            'amil_id' => $this->vrule_amil_id,
            'tanggaldonasi' => $this->vrule_tanggaldonasi,
            'insidentil' => $this->vrule_insidentil,
            'jumlahtotal' => $this->vrule_jumlahtotal,
            'keterangan' => $this->vrule_keterangan,
        ]);

        //untuk nantinya ditampilkan dalam alert boxnya
        $donatur_id = request('donatur_id');
        //dapatkan namadonaturnya
        $datadonatur =  \App\Donatur::find($donatur_id);
        $namadonatur = $datadonatur->namadonatur;

        //menambahkan datanya ke dalam database
        $status = Trxdonasi::create($validdata);
        
        //jika berhasil
        if($status){
            //menampilkan kuitansinya loh ya, bukan listnya lagi....
            //preparing data
            $keterangan = request('keterangan'); 
            $jumlahtotal = request('jumlahtotal'); 
            $tanggaldonasi = request('tanggaldonasi'); 
            $insidentil = request('insidentil'); 
            $dataamil = \App\Amil::find(request('amil_id')); 
    
            //id yang terakhir disimpan ini
            $idtransaksi = $status->id;

            // ============== DETAIL DONASI PART IS HERE

            //now listing the trxdonasidetail
            //ambil data peruntukandonasi buat ditampilkan di List Optionnya
            $listperuntukandonasi = \App\peruntukandonasi::where('statusaktif','=','1')
                                                        ->orderBy('namaperuntukandonasi','asc')
                                                        ->take('500')
                                                        ->get();
            
            //mendapatkan isi detail donasi yang mana tidak 0 tentunya
            foreach($listperuntukandonasi as $peruntukandonasi){
                
                if(request('detaildonasi'.$peruntukandonasi->id) > 0){
                    
                    $trxdonasidetail = new Trxdonasidetail;

                    $trxdonasidetail->trxdonasi_id = $idtransaksi;
                    $trxdonasidetail->peruntukandonasi_id = $peruntukandonasi->id;
                    $trxdonasidetail->jumlah = request('detaildonasi'.$peruntukandonasi->id);

                    //simpan juga sekarang
                    $trxdonasidetail->save();
                }
                
            }

            //sekarang dapatkan itu-itu yang sudah keentry
            $trxdonasi = \App\Trxdonasi::find($idtransaksi);

            $listtrxdonasidetail = $trxdonasi->trxdonasidetail;

            //konfig untuk data tampilannya utamanya
            $konfig = \App\Konfigurasi::first();

            
            //buat message nya
            $message = [
                'show'  => '1',
                'type' => 'success',
                'content' => 'Alhamdulillah, Transaksi dari "'.$namadonatur.'" sebesar "'.$jumlahtotal.'"  berhasil disimpan!',
                ];
    
            // tampilkan KUITANSINYA BRO
            return view('master/trxdonasi/kuitansi', compact('listtrxdonasidetail','konfig','insidentil','idtransaksi','datadonatur', 'tanggaldonasi','jumlahtotal', 'keterangan', 'dataamil','message'));
        }
        else{
            return dd('Uups! Error, data gagal masuk ke dalam database');
        }
        dd($status);
        



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Trxdonasi  $trxdonasi
     * @return \Illuminate\Http\Response
     */
    public function show(Trxdonasi $trxdonasi)
    {

        $idtransaksi = $trxdonasi->id;
        $tanggaldonasi = $trxdonasi->tanggaldonasi;
        $keterangan = $trxdonasi->keterangan;
        $jumlahtotal = $trxdonasi->jumlahtotal;
        $insidentil = $trxdonasi->insidentil;

        //dapatkan data amil
        $dataamil = $trxdonasi->amil;

        //dapatkan data donatur
        $datadonatur = $trxdonasi->donatur;

        $message = "";

        $listtrxdonasidetail = $trxdonasi->trxdonasidetail;

        //dd($listtrxdonasidetail);

       
        // tampilkan DETAILNYA BRO
        return view('master/trxdonasi/detail', compact('listtrxdonasidetail','insidentil','idtransaksi','datadonatur', 'tanggaldonasi','jumlahtotal', 'keterangan', 'dataamil', 'message'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Trxdonasi  $trxdonasi
     * @return \Illuminate\Http\Response
     */
    public function showKuitansi(Trxdonasi $trxdonasi)
    {

        $idtransaksi = $trxdonasi->id;
        $tanggaldonasi = $trxdonasi->tanggaldonasi;
        $keterangan = $trxdonasi->keterangan;
        $jumlahtotal = $trxdonasi->jumlahtotal;
        $insidentil = $trxdonasi->insidentil;

        //dapatkan data amil
        $dataamil = $trxdonasi->amil;

        //dapatkan data donatur
        $datadonatur = $trxdonasi->donatur;
        $message = "";

        $listtrxdonasidetail = $trxdonasi->trxdonasidetail;

        $konfig = \App\Konfigurasi::first();


        // tampilkan KUITANSINYA BRO
        return view('master/trxdonasi/kuitansi', compact('konfig','listtrxdonasidetail','insidentil','idtransaksi','datadonatur', 'tanggaldonasi','jumlahtotal', 'keterangan', 'dataamil',  'message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Trxdonasi  $trxdonasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Trxdonasi $trxdonasi)
    {
        //ambil data peruntukandonasi buat ditampilkan di List Optionnya
        $listperuntukandonasi = \App\peruntukandonasi::orderBy('namaperuntukandonasi','asc')
                                              ->take('500')
                                              ->get();

        //ambil data list amil buat ditampilkan di list Optionnya
        $listamil = \App\Amil::orderBy('namaamil','asc')
                                ->take('500')
                                ->get();


        //data transaksi adalah ya trx donasi itu
        $data = $trxdonasi;
        //rincian detail donasinya
        $datadetaildonasi = $trxdonasi->trxdonasidetail;

        //data donaturnya
        $datadonatur = $trxdonasi->donatur;
       
        // tampilkan KUITANSINYA BRO
        return view('master/trxdonasi/edit', compact('data', 'datadetaildonasi','datadonatur','listamil', 'listperuntukandonasi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Trxdonasi  $trxdonasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trxdonasi $trxdonasi)
    {
         //cek dulu apakah data nya valid ataukah tidak. 
         $validdata = request()->validate([
            'donatur_id' => $this->vrule_donatur_id,
            'amil_id' => $this->vrule_amil_id,
            'tanggaldonasi' => $this->vrule_tanggaldonasi,
            'insidentil' => $this->vrule_insidentil,
            'jumlahtotal' => $this->vrule_jumlahtotal,
            'keterangan' => $this->vrule_keterangan,
        ]);


        //UPDATE DATA DULU GAES
        $trxdonasi->donatur_id = $request->donatur_id;
        $trxdonasi->amil_id = $request->amil_id;
        $trxdonasi->tanggaldonasi = $request->tanggaldonasi;
        $trxdonasi->insidentil = $request->insidentil;
        $trxdonasi->jumlahtotal = $request->jumlahtotal;
        $trxdonasi->keterangan = $request->keterangan;

        //SIMPAN YUK
        $status = $trxdonasi->save();

        //jika suskes mengentry transaksi donasinya... 
        if($status){

                    //SEKARANG TRXDONASIDETAILNYA, JENGJENG.... 
                    //========================================================================================

                    //kita mulai dengan menghapus seluruh data yang ada trxdonasi_id nya sama dengan sekarang, 
                    //=== PHASE 1 MENGHAPUS DATA TRXDONASI DETAILNYA DAHULU
                    
                    $listtrxdonasidetail = $trxdonasi->trxdonasidetail;
                    //menghapus satu-satu trxdonasi detail
                    foreach($listtrxdonasidetail as $trxdonasidetail){
                        $statusitem = $trxdonasidetail->delete();
                    }

                    //=== PHASE 2 MENGISI ULANG DATA TRXDONASI DETAILNYA DAHULU

                        //ambil data peruntukandonasi buat ditampilkan UNTUK lOOP CHECK 
                        $listperuntukandonasi = \App\peruntukandonasi::orderBy('namaperuntukandonasi','asc')
                                                                    ->take('500')
                                                                    ->get();
                        
                        //mendapatkan isi detail donasi yang mana tidak 0 tentunya
                        foreach($listperuntukandonasi as $peruntukandonasi){
                            
                            if(request('detaildonasi'.$peruntukandonasi->id) > 0){
                                
                                $trxdonasidetail = new Trxdonasidetail;

                                $trxdonasidetail->trxdonasi_id = $trxdonasi->id;
                                $trxdonasidetail->peruntukandonasi_id = $peruntukandonasi->id;
                                $trxdonasidetail->jumlah = request('detaildonasi'.$peruntukandonasi->id);

                                //simpan juga sekarang
                                $trxdonasidetail->save();
                            }
                            
                        }

                    //================================= TRXDONASIDETAIL END =================================

            //menampilkan kuitansinya loh ya, bukan listnya lagi....
            //preparing data
            $keterangan = request('keterangan'); 
            
            $jumlahtotal = request('jumlahtotal'); 
            $tanggaldonasi = request('tanggaldonasi'); 
            $insidentil = request('insidentil'); 

            //dataamil
            $dataamil = $trxdonasi->amil; 
            //datadonatur
            $datadonatur = $trxdonasi->donatur; 

            //id yang terakhir disimpan ini
            $idtransaksi = $trxdonasi->id;
            
            //sekarang dapatkan itu-itu yang sudah keentry
            $listtrxdonasidetail = $trxdonasi->trxdonasidetail;

            //dapatkan konfigurasi
            //konfig untuk data tampilannya utamanya
            $konfig = \App\Konfigurasi::first();

            
            //buat message nya
            $message = [
                'show'  => '1',
                'type' => 'success',
                'content' => 'Alhamdulillah, Transaksi dari "'.$datadonatur->nama.'" sebesar "'.$jumlahtotal.'"  berhasil disimpan!',
                ];
    
            // tampilkan KUITANSINYA BRO
            return view('master/trxdonasi/kuitansi', compact('listtrxdonasidetail','konfig','insidentil','idtransaksi','datadonatur', 'tanggaldonasi','jumlahtotal', 'keterangan', 'dataamil','message'));    

        }
        else{
            return dd('Uups! Error, data gagal masuk ke dalam database');
        }
        dd($status);


    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Trxdonasi  $trxdonasi
     * @return \Illuminate\Http\Response
     */
    public function delete(Trxdonasi $trxdonasi)
    {

        $idtransaksi = $trxdonasi->id;
        $tanggaldonasi = $trxdonasi->tanggaldonasi;
        $keterangan = $trxdonasi->keterangan;
        $jumlahtotal = $trxdonasi->jumlahtotal;
        $insidentil = $trxdonasi->insidentil;

        //dapatkan data amil
        $dataamil = $trxdonasi->amil;

        //dapatkan data donatur
        $datadonatur = $trxdonasi->donatur;

        $message = "";

        $listtrxdonasidetail = $trxdonasi->trxdonasidetail;

        // tampilkan DETAILNYA BRO
        return view('master/trxdonasi/delete', compact('listtrxdonasidetail','insidentil','idtransaksi','datadonatur', 'tanggaldonasi','jumlahtotal', 'keterangan', 'dataamil', 'message'));
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Trxdonasi  $trxdonasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trxdonasi $trxdonasi)
    {
        //kompilasi buat messagenya sebelum kehapus
        $idtrxdonasi = $trxdonasi->id;
        $namadonatur = $trxdonasi->donatur->namadonatur;
        $tanggaldonasi = $trxdonasi->tanggaldonasi;
        $keterangan = $trxdonasi->keterangan;
        $jumlahtotal = $trxdonasi->jumlahtotal;

        $messagecontent = 'Transaksi Donasi atas nama "'.$namadonatur.'" Pada tanggal: -"'.$tanggaldonasi.'"- senilai -"'.number_format($jumlahtotal,0,',','.').'"- ('.$keterangan.' ) BERHASIL DIHAPUS';

         //buat message nya
         $message = [
            'show'  => '1',
            'type' => 'success',
            'content' => $messagecontent,
            ];

        //=== MENGHAPUS DATA TRXDONASI DETAILNYA DAHULU
        $listtrxdonasidetail = $trxdonasi->trxdonasidetail;

        $statuskumulatif = 1;
        //menghapus satu-satu trxdonasi detail
        foreach($listtrxdonasidetail as $trxdonasidetail){
            $statusitem = $trxdonasidetail->delete();

            $statuskumulatif = $statuskumulatif && $statusitem;
        }

        //=== LANJUT HAPUS DAT UTAMANYA DISINI
        $status = $trxdonasi->delete();

        if($status){

            $data = \App\Trxdonasi::select('id','donatur_id','amil_id','tanggaldonasi', 'keterangan', 'jumlahtotal')
                                        ->with(['donatur'])
                                        ->with(['amil'])
                                        ->orderBy('id', 'desc')
                                        ->take('500')
                                        ->get();


            return view('master/trxdonasi/tampilkan', compact('data', 'message'));
        }
        else{
            return dd('Uups! Error, data gagal masuk ke dalam database');
        }

        dd($status);
    }


    /**
     * Show the form for searching the specified resource.
     *
     * @param  \App\Trxdonasi  $trxdonasi
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        //ambil data list amil buat ditampilkan di list Optionnya
        $listamil = \App\Amil::orderBy('namaamil','asc')
                                ->take('500')
                                ->get();

        //ambil data peruntukandonasi buat ditampilkan di List Optionnya
        $listperuntukandonasi = \App\peruntukandonasi::orderBy('namaperuntukandonasi','asc')
                                                    ->take('500')
                                                    ->get();
       
        // tampilkan FORM CARINYA BRO
        return view('master/trxdonasi/search', compact('listamil', 'listperuntukandonasi'));
    }


    /**
     * Show the form for displaying search result of the specified resource.
     *
     * @param  \App\Trxdonasi  $trxdonasi
     * @return \Illuminate\Http\Response
     */

     public function searchResult(Request $request){
        //dapatkan semua isinya dahulu

        $keterangan = $request->keterangan;
        $jumlahtotalawal = $request->jumlahtotalawal;
        $jumlahtotalakhir = $request->jumlahtotalakhir;


        //dapatkan tanggal donasi dan memisahkannya (-)
        $tanggaldonasiantara = $request->tanggaldonasi;

        //dapatkan list amil
        $listamil = $request->amil_id;

        $insidentil = $request->insidentil;
        

        //semua donatur
        $donatur_id = $request->donatur_id;
        $semuadonatur = $request->checkboxsemuadonatur; //null jika tidak diisi, //1 jika di check

        //SEKARANG MEMBUAT QUERY-NYA YAA.. 
        $data = \App\Trxdonasi::select('id','donatur_id','amil_id','tanggaldonasi', 'keterangan', 'jumlahtotal')
                                    ->with(['donatur'])
                                    ->with(['amil'])
                                    //when amil_id
                                    ->when($request->amil_id != null, function($query) use ($listamil){
                                        return $query->whereIn('amil_id', $listamil);
                                    })
                                    //when insidentil di set
                                    ->when($insidentil != -1, function($query) use ($insidentil){
                                        return $query->where('insidentil', $insidentil);
                                    })

                                    //when keterangan
                                    ->when($request->keterangan != null, function($query) use ($keterangan){
                                        // dd("Deskripsi barang mengandung : ".$keterangan);
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

        return view('master/trxdonasi/tampilkan', compact('data'));

         dd($request->all());
     }


}
