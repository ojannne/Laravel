@extends('adminlte::page')
@section('tittle','𝖥𝗈𝗋𝗆 Mahasantri')

@section('content_header')
@section('content')
<h1>
    <h1><i class="fas fa-user-graduate"></i>
        Form Mahasantri</h1>
    <a href="{{ route('mahasantri.index')}}" class="btn btn-primary btn-md" role="button"><i class="fas fa-arrow-left"></i> Back</a><br><br>
    
    @if($errors->any())    
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @php
    $rs1 = App\Models\Jurusan::all();
    $rs2 = App\Models\Matakuliah::all();
    $rs3 = App\Models\Dosen::all();
    @endphp
    <form action="{{ route('mahasantri.store')}}" method="POST">
        @csrf
        {{-- cross-site request forgery (CSRF) = pencegahan serangan yang dilakukan oleh pengguna yang tidak terautentikasi --}}
        <div class="form-group">
           <label>Nama</label><input type="text" name="nama" class="form-control">
        </div>
        <div class="form-group">
           <label>NIM</label><input type="text" name="nim" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label>Jurusan</label>
        <select class="form-control" name="jurusan_id">
            <option value="">-- Pilih Jurusan --</option>
            @foreach($rs1 as $jrs)
            <option value="{{ $jrs->id }}">{{ $jrs->nama }}</option>
            @endforeach
        </select>          
    </div>
    <div class="form-group">
        <label>Matakuliah</label>
        <select class="form-control" name="matakuliah_id">
            <option value="">-- Pilih Matakuliah --</option>
            @foreach($rs2 as $mk)
            <option value="{{ $mk->id }}">{{ $mk->nama }}</option>
            @endforeach
        </select>          
    </div>
    <div class="form-group">
        <label>Dosen Pengajar</label>
        <select class="form-control" name="dosen_id">
            <option value="">-- Pilih Dosen --</option>
            @foreach($rs3 as $dsn)
            <option value="{{ $dsn->id }}">{{ $dsn->nama }}</option>
            @endforeach
        </select>
        </div>
    
        <br>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
    @stop

    @section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    @stop

    @section('js')
    <script>
        console.log('Hi!');
    </script>
    @stop