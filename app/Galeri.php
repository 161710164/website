<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $table='galeris';
    protected $fillable=['judul_galeri','foto','konten','kategorig_id'];
    public $timestamps=true;

    public function Kategorig()
	{
		return $this->belongsTo('App\Kategorig','kategorig_id');
	}
}
