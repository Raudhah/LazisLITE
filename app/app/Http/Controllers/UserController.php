<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Hash;

class UserController extends Controller
{
    //Daftar User

    public function __construct(){
        $this->middleware('auth');

        //only super admin can do this
        
        $levelakses = Auth::check();
        // dd($levelakses);
        
    }
    
    public function index(){

        $data = \App\User::all();
        
        return view('master/user/tampilkan', compact('data'));
    }

    public function edit(User $user){
        
        
    }

    public function update(Request $request, User $user){

        
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
