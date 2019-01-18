<?php
namespace App\Http\Controllers;

use App\Donatur;
use App\Amil;
use App\Pekerjaandonatur;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DonaturController extends Controller
{

    public $vrule_namadonatur = 'required|min:3';
    public $vrule_isdonaturrutin = 'nullable';
    public $vrule_iskotakinfaq = 'nullable';
    public $vrule_isdonaturinsidental = 'nullable';

    public $vrule_pekerjaandonatur_id = 'required|numeric';
    public $vrule_amil_id = 'required|numeric';
    public $vrule_alamatdonatur = '';
    public $vrule_nomortelepon = '';

    
    public $vrule_tanggallahir = 'sometimes|nullable|dateformat:d/m/Y';
    public $vrule_jeniskelamin = 'numeric|between:1,3';


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = \App\Donatur::select('id','namadonatur', 'alamatdonatur', 'nomortelepondonatur')
                            ->orderBy('id', 'desc')
                            ->take('500')
                            ->get();


        // dd($data);

        return view('master/donatur/tampilkan', compact('data', 'message'));
    }

    /** DONE
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        //ambil data pekerjaandonatur buat ditampilkan di List Optionnya
        $listpekerjaandonatur = \App\Pekerjaandonatur::where('statusaktif','=','1')
                                                        ->orderBy('namapekerjaandonatur','asc')
                                                        ->take('500')
                                                        ->get();

        //ambil data list amil buat ditampilkan di list Optionnya
        $listamil = \App\Amil::where('statusaktif','=','1')
                                ->orderBy('namaamil','asc')
                                ->take('500')
                                ->get();

        return view('master/donatur/tambah', compact('listpekerjaandonatur', 'listamil'));
    }

    /** DONE
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //cek dulu apakah data nya valid ataukah tidak. 
        $validdata = request()->validate([
            'namadonatur' => $this->vrule_namadonatur,
            'isdonaturrutin' => $this->vrule_isdonaturrutin,
            'iskotakinfaq' => $this->vrule_iskotakinfaq,
            'isdonaturinsidental' => $this->vrule_isdonaturinsidental,
            'amil_id' => $this->vrule_amil_id,
            'alamatdonatur' => $this->vrule_alamatdonatur,
            'nomortelepondonatur' => $this->vrule_nomortelepon,
            'tanggallahir' => $this->vrule_tanggallahir,
            'pekerjaandonatur_id' => $this->vrule_pekerjaandonatur_id,
            'jeniskelamin' => $this->vrule_jeniskelamin,            
        ]);

        //set value-nya
        $isdonaturrutin = $request->get('isdonaturrutin')==null ? 0 : 1;
        $iskotakinfaq = $request->get('iskotakinfaq')==null ? 0 : 1;
        $isdonaturinsidental = $request->get('isdonaturinsidental')==null ? 0 : 1;

        //dd(compact('isdonaturrutin', 'iskotakinfaq', 'isdonaturinsidental'));

        //untuk ditampilkan dalam alert boxnya
        $namadonatur = request('namadonatur');
        
        //menambahkan datanya
        $status = Donatur::create([
            'namadonatur' => $request->namadonatur,
            'isdonaturrutin' => $isdonaturrutin,
            'iskotakinfaq' => $iskotakinfaq,
            'isdonaturinsidental' => $isdonaturinsidental,
            'amil_id' => $request->amil_id,
            'alamatdonatur' => $request->alamatdonatur,
            'nomortelepondonatur' => $request->nomortelepondonatur,
            'tanggallahir' => $request->tanggallahir,
            'pekerjaandonatur_id' => $request->pekerjaandonatur_id,
            'jeniskelamin' => $request->jeniskelamin,
        ]); 
        
        //jika sukses menambahkan
        if($status){
            $data = \App\Donatur::select('id','namadonatur', 'alamatdonatur', 'nomortelepondonatur')
                                        ->orderBy('id', 'desc')
                                        ->take('500')
                                        ->get();
            //buat message nya
            $message = [
                'show'  => '1',
                'type' => 'success',
                'content' => 'Alhamdulillah, data '.$namadonatur.' berhasil disimpan!',
                ];
    
            // tampilkan juga
            return view('master/donatur/tampilkan', compact('data', 'message'));
        }
        else{
            return dd('Uups! Error, data gagal masuk ke dalam database');
        } 

        dd($validdata);
    }

    /** DONE
     * Display the specified resource.
     *
     * @param  \App\Donatur  $donatur
     * @return \Illuminate\Http\Response
     */
    public function show(Donatur $donatur)
    {
        //dapatkan data amil
        $amil = $donatur->amil;

        //dapatkan data pekerjaan donatur
        $pekerjaandonatur = $donatur->pekerjaandonatur;

        //biar standar di viewnya
        $data = $donatur;
    
        // dd(compact('data', 'amil','pekerjaandonatur'));
        // tampilkan 
        return view('master/donatur/detail', compact('data', 'amil','pekerjaandonatur'));
     
    }

    /** DONE
     * Show the form for editing the specified resource.
     *
     * @param  \App\Donatur  $donatur
     * @return \Illuminate\Http\Response
     */
    public function edit(Donatur $donatur)
    {
        $data = $donatur;
        //ambil data pekerjaandonatur buat ditampilkan di List Optionnya
        //disini ditampilkan semuanya.... tidak hanya yang staus aktif saja, 
        $listpekerjaandonatur = \App\Pekerjaandonatur::orderBy('statusaktif','desc')
                                                        ->orderBy('namapekerjaandonatur','asc')
                                                        ->take('500')
                                                        ->get();


        //ambil data list amil buat ditampilkan di list Optionnya
        //disini ditampilkan semuanya,... tidak hanya yang status aktif saja
        //semata agar memungkinkan admin mengubah isiannya atau tetap biarkan saja yang lama
        $listamil = \App\Amil::orderBy('statusaktif','desc')
                                ->orderBy('namaamil','asc')
                                ->take('500')
                                ->get();

        return view('master/donatur/edit', compact('data','listpekerjaandonatur', 'listamil'));
    }

    /** DONE
     * Update the specified resource in storage.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Donatur  $donatur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Donatur $donatur)
    {
        //cek dulu apakah data nya valid ataukah tidak. 
        $validdata = request()->validate([
            'namadonatur' => $this->vrule_namadonatur,
            'isdonaturrutin' => $this->vrule_isdonaturrutin,
            'iskotakinfaq' => $this->vrule_iskotakinfaq,
            'isdonaturinsidental' => $this->vrule_isdonaturinsidental,
            'amil_id' => $this->vrule_amil_id,
            'alamatdonatur' => $this->vrule_alamatdonatur,
            'nomortelepondonatur' => $this->vrule_nomortelepon,
            'tanggallahir' => $this->vrule_tanggallahir,
            'pekerjaandonatur_id' => $this->vrule_pekerjaandonatur_id,
            'jeniskelamin' => $this->vrule_jeniskelamin,            
        ]);

        //set value-nya untuk checkbox
        $isdonaturrutin = $request->get('isdonaturrutin')==null ? 0 : 1;
        $iskotakinfaq = $request->get('iskotakinfaq')==null ? 0 : 1;
        $isdonaturinsidental = $request->get('isdonaturinsidental')==null ? 0 : 1;

        //untuk ditampilkan dalam alert boxnya
        $namadonatur = request('namadonatur');
        
        //mengupdate isi datanya
        $donatur->namadonatur           = $request->namadonatur;
        $donatur->isdonaturrutin        = $isdonaturrutin;
        $donatur->iskotakinfaq          = $iskotakinfaq;
        $donatur->isdonaturinsidental   = $isdonaturinsidental;
        $donatur->amil_id               = $request->amil_id;
        $donatur->alamatdonatur         = $request->alamatdonatur;
        $donatur->nomortelepondonatur   = $request->nomortelepondonatur;
        $donatur->tanggallahir          = $request->tanggallahir;
        $donatur->pekerjaandonatur_id   = $request->pekerjaandonatur_id;
        $donatur->jeniskelamin          = $request->jeniskelamin;
        //simpan ke database.... 
        $status = $donatur->save();

        //jika sukses menambahkan, mari menampilkan
        if($status){
            $data = \App\Donatur::select('id','namadonatur', 'alamatdonatur', 'nomortelepondonatur')
                                        ->orderBy('id', 'desc')
                                        ->take('500')
                                        ->get();
            //buat message nya
            $message = [
                'show'  => '1',
                'type' => 'success',
                'content' => 'Alhamdulillah, data '.$namadonatur.' berhasil diupdate!',
                ];
    
            // tampilkan juga
            return view('master/donatur/tampilkan', compact('data', 'message'));
        }
        else{
            return dd('Uups! Error, data gagal masuk ke dalam database');
        } 

        dd($validdata);

    }

    /** DONE, kurang verif integrity check bisakan data donatur ini dihapus? 
     * Show the form for confirm DELETING the specified resource.
     *
     * @param  \App\Donatur  $donatur
     * @return \Illuminate\Http\Response
     */
    public function delete(Donatur $donatur)
    {
         //dapatkan data amil
         $amil = $donatur->amil;

         //dapatkan data pekerjaan donatur
         $pekerjaandonatur = $donatur->pekerjaandonatur;
 
         //biar standar di viewnya
         $data = $donatur;
     
         // dd(compact('data', 'amil','pekerjaandonatur'));
         // tampilkan 
         return view('master/donatur/delete', compact('data', 'amil','pekerjaandonatur'));

    }

    /** DONE... YEAAAY
     * Remove the specified resource from storage.
     * @param  \App\Donatur  $donatur
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Donatur $donatur)
    {
        //dapatkan namanya dulu sebelum dihapus
        $namadonatur = $donatur->namadonatur;

        //menghapus
        $status = $donatur->delete();

        //jika sukses menghapus, mari menampilkan
        if($status){
            $data = \App\Donatur::select('id','namadonatur', 'alamatdonatur', 'nomortelepondonatur')
                                        ->orderBy('id', 'desc')
                                        ->take('500')
                                        ->get();
            //buat message nya
            $message = [
                'show'  => '1',
                'type' => 'success',
                'content' => 'Alhamdulillah, data '.$namadonatur.' berhasil di HAPUS!',
                ];
    
            // tampilkan juga
            return view('master/donatur/tampilkan', compact('data', 'message'));
        }
        else{
            return dd('Uups! Error, gagal melakukan operasi ke dalam database');
        } 

        //apakah saya sampai disini?
        dd($donatur);
    }

    /** DONE
     * Show the form for searching the specified resource.
     *
     * @param  none
     * @return \Illuminate\Http\Response
     */
    public function search()
    {

        //ambil data pekerjaandonatur buat ditampilkan di List Optionnya
        //disini ditampilkan semuanya.... tidak hanya yang staus aktif saja, 
        $listpekerjaandonatur = \App\Pekerjaandonatur::orderBy('statusaktif','desc')
                                                        ->orderBy('namapekerjaandonatur','asc')
                                                        ->take('500')
                                                        ->get();


        //ambil data list amil buat ditampilkan di list Optionnya
        //disini ditampilkan semuanya,... tidak hanya yang status aktif saja
        //semata agar memungkinkan admin mengubah isiannya atau tetap biarkan saja yang lama
        $listamil = \App\Amil::orderBy('statusaktif','desc')
                                ->orderBy('namaamil','asc')
                                ->take('500')
                                ->get();

        return view('master/donatur/search', compact('listpekerjaandonatur', 'listamil'));
    }

    //YANG TANGGAL LAHIR ANTARA BUTUH DEBUGGING, CHECK BIAR VALID TIDAKNYA
    public function searchResult(Request $request){

        // dd($request->all());

        //jenis donatur
        $isdonaturrutin = $request->get('isdonaturrutin')==null ? 0 : 1;
        $iskotakinfaq = $request->get('iskotakinfaq')==null ? 0 : 1;
        $isdonaturinsidental = $request->get('isdonaturinsidental')==null ? 0 : 1;

        //dapatkan list amil dan list pekerjaandonatur (BENTUK ARRAY)
        $listamil = $request->amil_id;
        $listpekerjaandonatur = $request->pekerjaandonatur_id;
        //data jenis kelamin dan lainnya
        $jeniskelamin = $request->jeniskelamin;
        $namadonatur = $request->namadonatur;
        $alamatdonatur = $request->alamatdonatur;
        $nomortelepondonatur = $request->nomortelepondonatur;
        //Jeng-Jeng.... TANGGAL LAHIR
        $tanggallahirantara = $request->tanggallahir;
        //mecah dulu
        $tanggallahirarray = explode("-", $tanggallahirantara);
        //hapus spasi
        $tanggallahirawal = trim($tanggallahirarray[0]);
        $tanggallahirakhir = trim($tanggallahirarray[1]);
        
        $data = \App\Donatur::select('id','namadonatur', 'alamatdonatur', 'nomortelepondonatur')
                            //when amil_id
                            ->when($request->amil_id != null, function($query) use ($listamil){
                                return $query->whereIn('amil_id', $listamil);
                            })
                            //when pekerjaandonatur_id
                            ->when($request->pekerjaandonatur_id != null, function($query) use ($listpekerjaandonatur){
                                return $query->whereIn('pekerjaandonatur_id', $listpekerjaandonatur);
                            })
                            //============ TANDA CENTANG =================
                            //when donatur rutin
                            ->when($request->isdonaturrutin != 0, function($query) use ($isdonaturrutin){
                                return $query->where('isdonaturrutin',$isdonaturrutin);
                            })
                            //when kotak infaq
                            ->when($request->iskotakinfaq != 0, function($query) use ($iskotakinfaq){
                                return $query->where('iskotakinfaq',$iskotakinfaq);
                            })
                            //when donatur insidental
                            ->when($request->isdonaturinsidental != 0, function($query) use ($isdonaturinsidental){
                                return $query->where('isdonaturinsidental',$isdonaturinsidental);
                            })
                            //============ Jika JENIS KELAMIN diSet =================
                            ->when($request->jeniskelamin > 0, function($query) use ($jeniskelamin){
                                return $query->where('jeniskelamin',$jeniskelamin);
                            })
                            //when nama Donatur diset
                            ->when($namadonatur != null, function($query) use ($namadonatur){
                                return $query->where('namadonatur','like','%'.$namadonatur.'%');
                            })
                            //when Alamat Donatur diset
                            ->when($alamatdonatur != null, function($query) use ($alamatdonatur){
                                return $query->where('alamatdonatur','like','%'.$alamatdonatur.'%');
                            })
                            //when Nomor Telepon Donatur diset
                            ->when($nomortelepondonatur != null, function($query) use ($nomortelepondonatur){
                                return $query->where('nomortelepondonatur','like','%'.$nomortelepondonatur.'%');
                            })
                            //when tanggal lahir benar diset
                            ->when(($tanggallahirawal != null && $tanggallahirakhir != null), function($query) use ($tanggallahirawal, $tanggallahirakhir){
                                
                                $tanggallahirawal = Carbon::createFromFormat('d/m/Y', $tanggallahirawal)->toDateString();
                                $tanggallahirakhir = Carbon::createFromFormat('d/m/Y', $tanggallahirakhir)->toDateString();
                                
                                // dd(compact('tanggallahirawal', 'tanggallahirakhir'));

                                return $query->whereBetween('tanggallahir', [$tanggallahirawal, $tanggallahirakhir]);
                            })
                            ->orderBy('id', 'desc')
                            ->take('500')
                            ->get();

        return view('master/donatur/tampilkan', compact('data'));
        
    }

    //MENCARI DATA DONATUR BERDASARKAN KRITERIA SEDERHANA TERTENTU
    public function donaturAjaxSearch(Request $request){
        $input = $request->all();
        $query = $request->get('query');

        if($request->get('function') == 'searchdonatur'){

            //mencari-cari
            $data = \App\Donatur::select('id','namadonatur', 'alamatdonatur', 'nomortelepondonatur', 'amil_id')
                                        ->orWhere('namadonatur', 'like', '%'.$query.'%')
                                        ->orWhere('nomortelepondonatur', 'like', '%'.$query.'%')
                                        ->orWhere('alamatdonatur', 'like', '%'.$query.'%')
                                        ->orderBy('id', 'desc')
                                        ->take('50')
                                        ->get();
            //jika ada hasilnya ketemu
            if(count($data) > 0){
                $ketemu = 1;
                $hasilcari = $data;
            }
            else{
                $ketemu = 0;
                $hasilcari = "kosong";
            }
                                          
        }
        else{
            $ketemu = 0;
            $hasilcari = "kosong";
        }

        // return response()->json(['success'=>'Pencarian selesai', 'data'=>$input]);
        return response()->json(['success'=>'Pencarian selesai', 'ketemu'=>$ketemu ,'data'=>$hasilcari]);
    }
}
