<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table='gurus';
    protected $fillable=['foto','nama_guru','jabatan'];
    public $timestamps=true;   

}
