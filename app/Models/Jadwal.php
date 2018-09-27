<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    public function get_kelas()
    {
        return $this->belongsTo('App\Models\Kelas', 'kode_kelas', 'kode_kelas');
    }

    public function get_mapel()
    {
        return $this->belongsTo('App\Models\Mapel', 'kode_mapel', 'kode_mapel');
    }
}
