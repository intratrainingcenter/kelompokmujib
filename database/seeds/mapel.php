<?php

use Illuminate\Database\Seeder;

class mapel extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mapels')->insert([
            'nama_mapel' => str_random(10),
        ]);
    }
}
