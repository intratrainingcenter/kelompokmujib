<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    public function get_kelas()
    {
        return $this->belongsTo('App\Models\Kelas', 'kode_kelas', 'kode_kelas');
    }
}
