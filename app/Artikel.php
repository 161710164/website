<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $table='artikels';
    protected $fillable=['judul','foto','konten','kategori_id',];
    public $timestamps=true;

    public function Kategori()
	{
		return $this->belongsTo('App\Kategori','kategori_id');
	}
}
