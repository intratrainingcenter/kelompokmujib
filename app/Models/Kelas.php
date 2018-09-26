<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';

    public function get_siswa(){
      return $this->belongsTo('App\Models\Siswa','kode_kelas','kode_kelas');
    }
}
