<?php

use Illuminate\Database\Seeder;

class piket extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pikets')->insert([
            'kode_kelas' => 'kelas01',
            'nis' => '20181010',
            'hari' => 'Jum`at',
        ]);
    }
}
