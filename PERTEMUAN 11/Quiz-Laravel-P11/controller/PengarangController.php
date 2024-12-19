<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Pengarang;
class PengarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $ar_pengarang = DB::table('pengarang')
        ->select(
            'pengarang.*',
            'pengarang.nama AS nama',
            'pengarang.nama AS email',
            'pengarang.nama AS hp',
            'pengarang.nama AS foto')
        ->get();
        //arahkan data ke view pengarang 
        return view('pengarang.index',compact('ar_pengarang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pengarang.c_pengarang');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
         //1. proses validasi data
         $validasi = $request->validate(
            [
                'nama' => 'required',
                'email' => 'required|max:50',
                'hp' => 'required|unique:pengarang|numeric',
                'foto' => 'required',
            ],
            //2. menampilkan pesan kesalahan
            [
                'nama.required' => 'nama Wajib di Isi',
                'email.required' => 'email Wajib di Isi',
                'hp.required' => 'HP Wajib di Isi',
                'hp.unique' => 'HP Tidak Boleh Sama',
                'hp.numeric' => 'Harus Berupa Angka',
                'foto.required' => 'foto Wajib di Isi',
            ],
        );
        DB::table('pengarang')->insert([
            'nama' => $request->nama,
            'email' => $request->email,
            'hp' => $request->hp,
            'foto' => $request->foto,
        ]);
        // landing page
        //4.setelah input arahkan ke /pegawai
        return redirect()->route('pengarang.index')->with('success', 'Data Buku berhasil ditambahkan🎉🎉🎉');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //    
        $ar_pengarang = DB::table('pengarang')
        ->select('pengarang.*') // Ambil semua kolom dari tabel pengarang
        ->where('id', $id) // Tambahkan WHERE untuk filter berdasarkan ID
        ->get();
        //arahkan data ke view pengarang 
        return view('pengarang.show',compact('ar_pengarang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data = DB::table('pengarang')
        ->where('id', '=', $id)->get();
    return view('pengarang.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        //1. proses validasi data
        $validasi = $request->validate(
            [
                'hp' => 'required|unique:pengarang|numeric',            
            ],
            //2. menampilkan pesan kesalahan
            [
                'hp.required' => 'hp Wajib di Isi',
                'hp.unique' => 'hp Tidak Boleh Sama',
                'hp.numeric' => 'Harus Berupa Angka',
              
            ],
        );
        DB::table('pengarang')->where('id', '=', $id)->update(
            [
                'nama' => $request->nama,
                'email' => $request->email,
                'hp' => $request->hp,
                'foto' => $request->foto,                
            ]
        );
      //4.setelah input arahkan ke /pegawai
      return redirect()->route('pengarang.index')->with('success', 'Data Pengarang Berhasil diUbah🎉🎉🎉');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        DB::table('pengarang')->where('id', $id)->delete();
        return redirect('/pengarang');
    }
}
