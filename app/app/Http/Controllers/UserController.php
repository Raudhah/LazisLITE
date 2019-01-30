<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
{
    //Daftar User

    public function __construct(){
        $this->middleware('auth');

        //only super admin can do this
        
        $levelakses = Auth::check();
        dd($levelakses);
        
    }
    
    public function index(){

        $data = \App\User::all();
        
        return view('master/user/tampilkan', compact('data'));
    }

    public function gantiPassword(){
        
    }

    public function gantiPasswordProses(){

    }

    
}
