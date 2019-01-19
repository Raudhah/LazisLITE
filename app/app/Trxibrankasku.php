<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Trxibrankasku extends Model
{
    protected $table = 'trxibrankasku';

    protected $fillable = ['donatur_id', 'amil_id', 'peruntukandonasi_id', 'tanggaldonasi', 'deskripsibarang', 'nominalvaluasi'];

    //eloquent relation dengan peruntukan donasi
    public function peruntukandonasi(){
        return $this->belongsTo('App\peruntukandonasi');
    }

    //eloquent relation dengan tabel Amil
    public function amil(){
        return $this->belongsTo('App\Amil');
    }

    //eloquent relation dengan tabel Donatur
    public function donatur(){
        return $this->belongsTo('App\Donatur');
    }


    //date and time format conversion
    //mengubah format tanggal donasi dari d-m-Y ke Y-m-d untuk disimpan ke DB
    public function setTanggaldonasiAttribute($value){
        if($value!= null){
            $this->attributes['tanggaldonasi']   = Carbon::createFromFormat('d/m/Y', $value)->toDateString(); 
        }
        else{
            $this->attributes['tanggaldonasi']   = null;
        }
        
    }

    //mengubah format tanggal donasi dari d-m-Y ke Y-m-d untuk disimpan ke DB
    public function getTanggaldonasiAttribute($value){
        if($value!= null){
            $date = Carbon::parse($value);
            return $date->format('d/m/Y'); 
        }
        else{
            return null;
        }

    }
}
