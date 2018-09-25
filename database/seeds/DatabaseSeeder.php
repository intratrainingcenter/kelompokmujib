<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(mapel::class);
        $this->call(kelas::class);
        $this->call(piket::class);
        $this->call(siswa::class);
    }
}
