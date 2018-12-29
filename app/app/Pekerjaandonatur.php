<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pekerjaandonatur extends Model
{
    //
    protected $table = 'pekerjaandonatur';
    protected $fillable = ['namapekerjaandonatur', 'statusaktif'];

    public function donatur(){
        return $this->hasMany('App\Donatur');
    } 


    // public static function getTopLatest(){
    //     return $result = $this->all()
    //                     ->orderBy('statusaktif', 'desc')
    //                     ->orderBy('namapekerjaandonatur', 'asc')
    //                     ->take('500')
    //                     ->get();
    // }

}
