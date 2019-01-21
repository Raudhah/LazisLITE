<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Trxdonasidetail extends Model
{
    protected $table = 'trxdonasidetail';

    protected $fillable = ['trxdonasi_id', 'peruntukandonasi_id', 'jumlah'];

    //eloquent relation dengan peruntukan donasi
    public function peruntukandonasi(){
        return $this->belongsTo('App\peruntukandonasi');
    }

    //eloquent relation dengan tabel Donatur
    public function donatur(){
        return $this->belongsTo('App\Donatur');
    }

    //eloquent relation dengan tabel Trxdonasi
    public function trxdonasi(){
        return $this->belongsTo('App\Trxdonasi');
    }

}
