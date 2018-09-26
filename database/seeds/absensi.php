<?php

use Illuminate\Database\Seeder;

class absensi extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('absensis')->insert([
            'nis' => 20181010,
            'keterangan' => 'Alpa',
            'created_at' => date('Y-m-d'),
        ]);
    }
}
