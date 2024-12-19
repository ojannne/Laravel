<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;
use App\Models\Buku;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $ar_buku = DB::table('buku')
            ->join('pengarang', 'pengarang.id', '=', 'buku.idpengarang')
            ->join('penerbit', 'penerbit.id', '=', 'buku.idpenerbit')
            ->join('kategori', 'kategori.id', '=', 'buku.idkategori')
            ->select(
                'buku.*',
                'pengarang.nama AS nama',
                'penerbit.nama AS pen',
                'kategori.nama AS kat'
            )->get();
        return view('buku.index', compact('ar_buku'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('buku.c_buku');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //1. proses validasi data
        $validasi = $request->validate(
            [
                'isbn' => 'required|unique:buku|numeric',
                'judul' => 'required|max:50',
                'tahun_cetak' => 'required',
                'stok' => 'required',
                'idpengarang' => 'required',
                'idpenerbit' => 'required',
                'idkategori' => 'required',
            ],
            //2. menampilkan pesan kesalahan
            [
                'isbn.required' => 'ISBN Wajib di Isi',
                'isbn.unique' => 'ISBN Tidak Boleh Sama',
                'isbn.numeric' => 'Harus Berupa Angka',
                'judul.required' => 'judul Wajib di Isi',
                'tahun_cetak.required' => 'Tahun_Cetak Wajib di Isi',
                'stok.required' => 'stok Wajib di Isi',
                'idpengarang.required' => 'idpengarang Wajib di Isi',
                'idpenerbit.required' => 'idpenerbit Wajib di Isi',
                'idkategori.required' => 'idkategori Wajib di Isi',
            ],
        );
        DB::table('buku')->insert([
            'isbn' => $request->isbn,
            'judul' => $request->judul,
            'tahun_cetak' => $request->tahun_cetak,
            'stok' => $request->stok,
            'idpengarang' => $request->idpengarang,
            'idpenerbit' => $request->idpenerbit,
            'idkategori' => $request->idkategori,
        ]);
        // landing page
        //4.setelah input arahkan ke /pegawai
        return redirect()->route('buku.index')->with('success', 'Data Buku berhasil ditambahkan🎉🎉🎉');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $ar_buku = DB::table('buku')
            ->join('pengarang', 'pengarang.id', '=', 'buku.idpengarang')
            ->join('penerbit', 'penerbit.id', '=', 'buku.idpenerbit')
            ->join('kategori', 'kategori.id', '=', 'buku.idkategori')
            ->select('buku.*', 'pengarang.nama AS nama', 'penerbit.nama AS pen', 'kategori.nama AS kat')
            ->where('buku.id', '=', $id)->get();

        return view('buku.show', compact('ar_buku'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //mengarahkan ke halaman form edit buku
        $data = DB::table('buku')
            ->where('id', '=', $id)->get();
        return view('buku.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
          //1. proses validasi data
          $validasi = $request->validate(
            [
                'isbn' => 'required|unique:buku|numeric',            
            ],
            //2. menampilkan pesan kesalahan
            [
                'isbn.required' => 'ISBN Wajib di Isi',
                'isbn.unique' => 'ISBN Tidak Boleh Sama',
                'isbn.numeric' => 'Harus Berupa Angka',
              
            ],
        );
        DB::table('buku')->where('id', '=', $id)->update(
            [
                'isbn' => $request->isbn,
                'judul' => $request->judul,
                'tahun_cetak' => $request->tahun_cetak,
                'stok' => $request->stok,
                'idpengarang' => $request->idpengarang,
                'idpenerbit' => $request->idpenerbit,
                'idkategori' => $request->idkategori,
            ]
        );
      //4.setelah input arahkan ke /pegawai
      return redirect()->route('buku.index')->with('success', 'Data Buku Berhasil diUbah🎉🎉🎉');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //menghapus data
        DB::table('buku')->where('id', $id)->delete();
        return redirect('/buku');
    }
    public function bukuPDF()
    {
        //
        $ar_buku = DB::table('buku')
            ->join('pengarang', 'pengarang.id', '=', 'buku.idpengarang')
            ->join('penerbit', 'penerbit.id', '=', 'buku.idpenerbit')
            ->join('kategori', 'kategori.id', '=', 'buku.idkategori')
            ->select(
                'buku.*',
                'pengarang.nama AS nama',
                'penerbit.nama AS pen',
                'kategori.nama AS kat'
            )->get();
            $pdf = PDF::loadView('buku/bukuPDF',['ar_buku'=>$ar_buku]); 
            return $pdf->download('dataBuku.pdf');
    }
}
