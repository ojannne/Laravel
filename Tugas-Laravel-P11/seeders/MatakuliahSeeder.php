<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class MatakuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table ('matakuliah')->insert(
            [
                [
                    'kode_mk' => 'MK01','nama'=>'Web Design',
                ],                
                [
                    'kode_mk' => 'MK02','nama'=>'Fundamental Digital Marketing',
                ],                
                [
                    'kode_mk' => 'MK03','nama'=>'Database SQL',
                ],                
                [
                    'kode_mk' => 'MK04','nama'=>'Multimedia',
                ],                
                ]);        
    }
}
