<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Mahasantri;

class MahasantriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ar_mahasantri = DB::table('mahasantri') 
        ->join('dosen', 'dosen.id', '=', 'mahasantri.dosen_id')
        ->join('matakuliah', 'matakuliah.id', '=', 'dosen.matakuliah_id')
        ->join('jurusan', 'jurusan.id', '=', 'mahasantri.jurusan_id')
        ->select('mahasantri.*', 'jurusan.nama AS jrs','dosen.nama AS dp', 
        'matakuliah.nama AS mk')->get();
        return view('mahasantri.index',compact('ar_mahasantri'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('mahasantri.c_mahasantri');
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
                'nama' => 'required|max:45',
                'nim' => 'required|unique:mahasantri|numeric',             
                'jurusan_id' => 'required',
                'matakuliah_id' => 'required',
                'dosen_id' => 'required',
            ],
            //2. menampilkan pesan kesalahan
            [
                'nama.required' => 'nama Wajib di Isi',
                'nim.required' => 'NIM Wajib di Isi',
                'nim.unique' => 'NIM Tidak Boleh Sama',
                'nim.numeric' => 'Harus Berupa Angka',               
                'jurusan_id.required' => 'jurusan_id Wajib di Isi',
                'matakuliah_id.required' => 'matakuliah_id Wajib di Isi',
                'dosen_id.required' => 'dosen_id Wajib di Isi',
            ],
        );
        DB::table('mahasantri')->insert([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'jurusan_id' => $request->jurusan_id,
            'dosen_id' => $request->dosen_id,
        ]);
        // landing page
        //4.setelah input arahkan ke /pegawai
        return redirect()->route('mahasantri.index')->with('success', 'Data Mahasantri berhasil ditambahkan🎉🎉🎉');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $ar_mahasantri = DB::table('mahasantri')
        ->join('dosen', 'dosen.id', '=', 'mahasantri.dosen_id')
        ->join('matakuliah', 'matakuliah.id', '=', 'dosen.matakuliah_id')
        ->join('jurusan', 'jurusan.id', '=', 'mahasantri.jurusan_id')
        ->select('mahasantri.*','dosen.nama AS dp',  'jurusan.nama AS jrs',
        'matakuliah.nama AS mk')
        ->where('mahasantri.id', '=', $id)->get();

    return view('mahasantri.show', compact('ar_mahasantri'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data = DB::table('mahasantri')
        ->where('id', '=', $id)->get();
    return view('mahasantri.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // 1. Proses validasi data
        $validasi = $request->validate(
            [
                'nim' => 'required|unique:mahasantri|numeric',            
            ],
            //2. menampilkan pesan kesalahan
            [
                'nim.required' => 'NIM Wajib di Isi',
                'nim.unique' => 'NIM Tidak Boleh Sama',
                'nim.numeric' => 'Harus Berupa Angka',
              
            ],
        );
    
        // 3. Update data mahasantri
        DB::table('mahasantri')->where('id', '=', $id)->update(
            [
                'nama' => $request->nama,
                'nim' => $request->nim,
                'jurusan_id' => $request->jurusan_id,
                'dosen_id' => $request->dosen_id,
               
            ]
        );
    
        // 4. Redirect ke halaman index dengan pesan sukses
        return redirect()->route('mahasantri.index')->with('success', 'Data Mahasantri berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        DB::table('mahasantri')->where('id', $id)->delete();
        return redirect('/mahasantri');
    }
}