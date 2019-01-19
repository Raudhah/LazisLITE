<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Amil extends Model
{
    protected $table = 'amil';
    protected $fillable = ['namaamil', 'alamatamil','nomorteleponamil','statusaktif'];

    public function donatur(){
        return $this->hasMany('App\Donatur');
    } 

    public function trxibrankasku(){
        return $this->hasMany('App\Trxibrankasku');
    } 
}
