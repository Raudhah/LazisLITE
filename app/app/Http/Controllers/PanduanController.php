<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class PanduanController extends Controller
{
 
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        // $user = Auth()::user();

        // //jika usernya levelaksesnya 1
        // if($user->levelakses == 1){
        //     return view('master/panduan/daftarisiadmin');
        // }
        // else{
        //     return view('master/panduan/daftarisisuperadmin');
        // }
    }

    public function daftarisiadmin(){
        return view('master/panduan/daftarisiadmin');
    }
}
