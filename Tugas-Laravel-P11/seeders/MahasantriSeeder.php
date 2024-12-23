<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class MahasantriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('mahasantri')->insert(
            [
                [
                    'nama'=>'Bedu','nim'=>'189340','dosen_id'=>3,
                     'jurusan_id'=>2
                ],               
                [
                    'nama'=>'Bambang','nim'=>'19890','dosen_id'=>1,
                     'jurusan_id'=>1
                ],               
                [
                    'nama'=>'Bobby','nim'=>'198349','dosen_id'=>2,
                     'jurusan_id'=>2
                ],                
            ]);      
    }
}
