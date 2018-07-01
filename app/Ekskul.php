<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ekskul extends Model
{
    protected $table='ekskuls';
    protected $fillable=['nama_ekskul','foto','konten'];
    public $timestamps=true;

}
