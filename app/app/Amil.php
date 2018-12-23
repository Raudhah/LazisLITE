<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Amil extends Model
{
    protected $table = 'amil';
    protected $fillable = ['namaamil', 'alamatamil','nomorteleponamil','statusaktif'];
}
