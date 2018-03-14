<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\mahasiswa;
class dosen extends Model
{
    protected $table = 'dosen';

	protected $fillable = array('nama', 'nipd');

	public function mahasiswa() {
		return $this->hasMany('App\mahasiswa', 'id_dosen');
	}

}