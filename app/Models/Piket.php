<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Piket extends Model
{
    public function get_kelas()
    {
        return $this->belongsTo('App\Models\Kelas', 'kode_kelas', 'kode_kelas');
    }

    public function get_siswa()
    {
        return $this->belongsTo('App\Models\Siswa', 'nis', 'nis');
    }
}
