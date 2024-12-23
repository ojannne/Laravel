<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table ('dosen')->insert(
            [
                [
                    'nama' => 'Ust.Feby','email'=>'ppl1@gmail.com','hp'=>'081298765432','alamat'=>'surabaya','matakuliah_id'=>'1',
                ],
                [
                    'nama' => 'Ust.Faruq','email'=>'dm1@gmail.com','hp'=>'088534995746','alamat'=>'Jombang','matakuliah_id'=>'2',
                ],
                [
                    'nama' => 'Ust.Fajri','email'=>'dm2@gmail.com','hp'=>'095799834853','alamat'=>'Malang','matakuliah_id'=>'4',
                ],
                ]);    
 }
}