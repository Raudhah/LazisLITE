<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    //Daftar User

    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){

        $data = \App\User::all();
        
        return view('master/user/tampilkan', compact('data'));


    }
}
