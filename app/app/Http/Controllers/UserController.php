<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Hash;

class UserController extends Controller
{
    //Daftar User

    public $vrule_name = 'required|min:3';
    public $vrule_email = 'required|email';
    public $vrule_levelakses = 'required|numeric';
    public $vrule_password = 'required|min:8|confirmed';

    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){

        $data = \App\User::all();
        
        return view('master/user/tampilkan', compact('data'));
    }

    //menampilkan form tambah user
    public function create(){
        return view('master/user/tambah');
    }

    //menyimpan di dalam database
    public function Store(Request $request){
        //dapatkan validasinya dulu ini
        //cek dulu apakah data nya valid ataukah tidak. 
        $validdata = request()->validate([
            'name' => $this->vrule_name,
            'email' => $this->vrule_email,
            'levelakses' => $this->vrule_levelakses,
            'password' => $this->vrule_password,            
        ]);



        //buat data dan simpan
        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->levelakses = $request->levelakses;
        $user->password = Hash::make($request->password);

        //simpan
        $status = $user->save();
        
        if($status){
            $message = [
                'show'  => '1',
                'type' => 'success',
                'content' => 'Alhamdulillah, User baru '.$user->name.' berhasil disimpan!',
                ];
            $data = \App\User::all();
    
            return view('master/user/tampilkan', compact('data', 'message'));
            
        }
        else{
            dd("Uuups, gagal memasukkan ke database. Mohon periksa kembali database anda.");
        }



    }

    public function delete(User $user){
        $data = $user;
        return view('master/user/delete', compact('data'));
    }

    public function destroy(Request $request, User $user){

        $name = $user->name;
        $status = $user->delete();

        if($status){
            $message = [
                'show'  => '1',
                'type' => 'success',
                'content' => 'Alhamdulillah, User '.$name.' berhasil di HAPUS!',
                ];
            $data = \App\User::all();
    
            return view('master/user/tampilkan', compact('data', 'message'));
        }
        else{
            dd("uups, maaf gagal menghapus user dari database");
        }
        
    }

    public function gantiPassword(){
        //dapatkan current id sekarang

        $userid = Auth::user()->id; 
        // dd($userid);
        return view('master/user/gantipassword', compact('userid'));
    }

    public function gantiPasswordProses(Request $request){

        //validasi dulu passwordnya beneran cocok apa ndak
        //cek dulu apakah data nya valid ataukah tidak. 
        $validdata = request()->validate([
            'passwordlama' => 'required|min:8',
            'passwordbaru' => 'required|min:8',
            'passwordbaruconfirm' => 'required|min:8|same:passwordbaru'
        ]);


        //dapatkan user Id yang sekarang
        $userid = Auth::user()->id;
        $oldpassword = Auth::user()->password;

        //check kalau passwordnya ndak sama
        if(Hash::check($request->passwordbaru, $oldpassword)){

            $newpassword = Hash::make($request->passwordbaru);

            $user = \App\User::find($userid);
            $user->password = $newpassword;
            $status = $user->save();

            if($status){
                $message = [
                    'show'  => '1',
                    'type' => 'success',
                    'content' => 'Alhamdulillah, Password berhasil diubah!',
                    ];

                return view('master/user/gantipassword', compact('userid', 'message'));
            }


            
        }
        else{
            $message = [
                'show'  => '1',
                'type' => 'error',
                'content' => 'Uuups, Password Lama yang Anda masukkan tidak tepat. Gunakan password yang Anda pakai Login ke aplikasi ini. ',
                ];

            return view('master/user/gantipassword', compact('userid', 'message'));
        }

    }

    
}
