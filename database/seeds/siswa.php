<?php

use Illuminate\Database\Seeder;

class siswa extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('siswas')->insert([
            'nis' => 20181010,
            'nama' => 'namaku',
            'kode_kelas' => 'kelas01',
        ]);
    }
}
