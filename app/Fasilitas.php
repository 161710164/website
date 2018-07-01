<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    protected $table='fasilitas';
    protected $fillable=['nama_fasilitas','foto','kategorif_id'];
    public $timestamps=true;

    public function Kategorif()
	{
		return $this->belongsTo('App\Kategorif','kategorif_id');
	}
}
