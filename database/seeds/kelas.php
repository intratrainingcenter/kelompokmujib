<?php

use Illuminate\Database\Seeder;

class kelas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kelas')->insert([
            ['kode_kelas' => 'kelas01',
            'nama_kelas' => 'A-1',],
            ['kode_kelas' => 'kelas02',
            'nama_kelas' => 'A-2',]
        ]);
    }
}
