<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('jurusan')->insert(
            [
                [
                    'nama' => 'Pengembangan Perangkat Lunak'
                ],
                [
                    'nama' => 'Digital Marketing'
                ],
            ]);

    }
}
