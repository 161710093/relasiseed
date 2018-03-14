<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\mahasiswa;
class hobi extends Model
{
    protected $table = 'hobi';

	protected $fillable = array('hobi');
	public function mahasiswa() {
		return $this->belongsToMany('App\mahasiswa', 'mahasiswa_hobi', 'id_hobi', 'id_mahasiswa');
	}

}
