<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staf extends Model
{
    protected $table='stafs';
    protected $fillable=['foto','nama_staf','jabatan'];
    public $timestamps=true;
}
