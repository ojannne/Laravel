@extends('adminlte::page')
@section('tittle','Edit Mahasantri')

@section('content_header')
@section('content')
<h1>
    <h1><i class="fas fa-book"></i>
        Edit Mahasantri</h1>
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

    @foreach($data as $d)
    <form action="{{ route('mahasantri.update',$d->id) }}" method="POST">
        @csrf
        @method('put')

        <div class="form-group">
            <label>Nama</label><input type="text" name="nama" value="{{ $d->nama }}" class="form-control" />
        </div>
        <div class="form-group">
            <label>NIM</label><input type="text" name="nim" value="{{ $d->nim }}" class="form-control" />
        </div>     
        <div class="form-group">
            <label>Jurusan</label>
            <select class="form-control" name="jurusan_id">
                <option value="">-- Pilih Jurusan --</option>
                @foreach($rs1 as $jrs)
                @php
                $sel1 = ($jrs->id == $d->jurusan_id) ? 'selected' : '';
                @endphp
                <option value="{{ $jrs->id }}" {{ $sel1 }}>{{ $jrs->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Matakuliah</label>
            <select class="form-control" name="dosen_id">
                <option value="">-- Pilih Matakuliah --</option>
                @foreach($rs2 as $mk)
                @php
                $sel2 = ($mk->id == $d->dosen_id) ? 'selected' : '';
                @endphp
                <option value="{{ $mk->id }}" {{ $sel2 }}>{{ $mk->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Dosen</label>
            <select name="dosen_id" class="form-control">
                <option value="">-- Pilih Dosen --</option>
                @foreach($rs3 as $dsn)
                @php
                $sel3 = ($dsn->id == $d->dosen_id) ? 'selected' : '';
                @endphp
                <option value="{{ $dsn->id }}" {{$sel3}}>{{ $dsn->nama }}</option>
                @endforeach
            </select>
        </div>
        <br>
        <button type="submit" class="btn btn-primary"
            name="proses">Update</button>
        <button type="reset" class="btn btn-warning"
            name="unproses">Cancel</button>
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