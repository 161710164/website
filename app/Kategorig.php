<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategorig extends Model
{
    protected $table='kategorigs';
    protected $fillable=['nama_galeri'];
    public $timestamps=true;

    public function Galeri()
	{
		return $this->hasMany('App\Galeri','kategorig_id');
	}

  
}
