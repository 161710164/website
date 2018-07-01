<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategorif extends Model
{
    protected $table='kategorifs';
    protected $fillable=['nama_fasilitas'];
    public $timestamps=true;

    public function Fasilitas()
	{
		return $this->hasMany('App\Fasilitas','kategorif_id');
	}


}
