<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    public function get_siswa()
    {
        return $this->belongsTo('App\Models\Siswa', 'nis', 'nis');
    }
}
