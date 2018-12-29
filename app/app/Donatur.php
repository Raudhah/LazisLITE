<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Donatur extends Model
{
    protected $table = 'donatur';
    // protected $fillable = ['namadonatur', 'alamatamil','nomorteleponamil','statusaktif'];
    protected $guarded = [];

    public function pekerjaandonatur(){
        return $this->belongsTo('App\Pekerjaandonatur');
    }

    public function amil(){
        return $this->belongsTo('App\Amil');
    }

    //mengubah format tanggal lahir dari d-m-Y ke Y-m-d untuk disimpan ke DB
    public function setTanggallahirAttribute($value){
        $this->attributes['tanggallahir']   = Carbon::createFromFormat('d/m/Y', $value)->toDateString(); 
    }

    //mengubah format tanggal lahir dari d-m-Y ke Y-m-d untuk disimpan ke DB
    public function getTanggallahirAttribute($value){
        $date = Carbon::parse($value);
        return $date->format('d/m/Y'); 
    }
}
