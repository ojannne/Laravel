<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SantriController extends Controller
{
    public function dataSantri(){
        $mhs1 = 'Fauzan'; $asa11 = 'Bekasi';
        $mhs2 = 'Mehmed'; $asa12 = 'Jakarta';
        $mhs3 = 'Ujang'; $asa13 = 'Bandung';
        $mhs4 = 'Udin'; $asa14 = 'Cirebon';
        $mhs5 = 'Kasep'; $asa15 = 'Cianjur';
        return view('data_santri',
        compact('mhs1','mhs2','mhs3','mhs4','mhs5','asa11','asa12','asa13','asa14','asa15')
        );
    }
}
