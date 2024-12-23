@extends('adminlte::page')
@section('tittle','Detail Mahasantri')

@section('content_header')
@section('content')
<h1>
    <h1><i class="fas fa-user-graduate"></i>
        Detail Mahasantri</h1>
    <a href="{{ route('mahasantri.index')}}" class="btn btn-primary btn-md" role="button"><i class="fas fa-arrow-left"></i> Back</a><br><br>
    
    @php
    $rs1 = App\Models\jurusan::all();
    $rs2 = App\Models\matakuliah::all();
    $rs3 = App\Models\Dosen::all();
    @endphp
    
    @foreach($ar_mahasantri as $mhs)
    <form>
        @csrf
        <div class="form-group">
            <label>Nama</label><input type="text" placeholder="{{ $mhs->nama }}"  class="form-control" disabled/>
        </div>
        <div class="form-group">
            <label>NIM</label><input type="text" placeholder="{{ $mhs->nim }}"  class="form-control" disabled/>
        </div>
        <div class="form-group">
            <label>Jurusan</label>
            <select name="jurusan_id" class="form-control" disabled>
                <option value="">-- Pilih Jurusan --</option>
                @foreach($rs1 as $jrs)
                 @php
                    $sel1 = ($jrs->id == $mhs->jurusan_id) ? 'selected' : '';
                 @endphp
                <option value="{{ $jrs->id }}" {{$sel1}}>{{ $jrs->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Matakuliah</label>
            <select class="form-control" name="dosen_id" disabled>
                <option value="">-- Pilih matakuliah --</option>
                @foreach($rs2 as $mk)
                 @php
                    $sel2 = ($mk->id == $mhs->dosen_id) ? 'selected' : '';
                 @endphp     
                <option value="{{ $mk->id }}" {{ $sel2 }}>{{ $mk->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Dosen Pengajar</label>
            <select class="form-control" name="dosen_id" disabled>
                <option value="">-- Pilih Dosen Pengajar --</option>
                @foreach($rs3 as $dsn)
                 @php
                    $sel3 = ($dsn->id == $mhs->dosen_id) ? 'selected' : '';
                 @endphp
                <option value="{{ $dsn->id }}" {{ $sel3 }}>{{ $dsn->nama }}</option>
                @endforeach
            </select>
        </div>
            <br>
        <button type="submit" class="btn btn-danger">Batal</button>
    </form>
    @endforeach
    @stop

    @section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    @stop

    @section('js')
    <script>
        console.log('Hi!');
    </script>
    @stop


    