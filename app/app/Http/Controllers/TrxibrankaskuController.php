<?php

namespace App\Http\Controllers;

use App\Trxibrankasku;
//dependency relations untuk modelnya
use App\Amil;
use App\peruntukandonasi;
use App\Donatur;
use Illuminate\Http\Request;

class TrxibrankaskuController extends Controller
{


    public $vrule_donatur_id = 'required|numeric|min:0';
    public $vrule_amil_id = 'required|numeric|min:0';
    public $vrule_peruntukandonasi_id = 'required|numeric|min:0';

    public $vrule_tanggaldonasi = 'required|dateformat:d/m/Y';

    public $vrule_nominalvaluasi = 'sometimes|numeric|min:0';
    public $vrule_deskripsibarang = 'required|min:3';


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
            
            //buat message nya
            $message = [
                'show'  => '1',
                'type' => 'success',
                'content' => 'Alhamdulillah, Transaksi "'.$deskripsibarang.'" berhasil disimpan!',
                ];
    
            // tampilkan KUITANSINYA BRO
            return view('master/trxibrankasku/kuitansi', compact('idtransaksi','datadonatur', 'tanggaldonasi','nominalvaluasi', 'deskripsibarang', 'dataamil', 'dataperuntukandonasi', 'message'));
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

        // dd($datadonatur);

        // dd(compact('idtransaksi','datadonatur', 'tanggaldonasi','nominalvaluasi', 'deskripsibarang', 'dataamil', 'dataperuntukandonasi', 'message'));

        // tampilkan KUITANSINYA BRO
        return view('master/trxibrankasku/kuitansi', compact('idtransaksi','datadonatur', 'tanggaldonasi','nominalvaluasi', 'deskripsibarang', 'dataamil', 'dataperuntukandonasi', 'message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Trxibrankasku  $trxibrankasku
     * @return \Illuminate\Http\Response
     */
    public function edit(Trxibrankasku $trxibrankasku)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Trxibrankasku  $trxibrankasku
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trxibrankasku $trxibrankasku)
    {
        //
    }
}
