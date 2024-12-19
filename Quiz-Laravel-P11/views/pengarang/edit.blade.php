@extends('adminlte::page')
@section('tittle','Edit Pengarang')

@section('content_header')
@section('content')
<h1>
    <h1><i class="fas fa-book"></i>
        Edit Pengarang</h1>
    <a href="{{ route('pengarang.index')}}" class="btn btn-primary btn-md" role="button"><i class="fas fa-arrow-left"></i> Back</a><br><br>
    @if($errors->any())    
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
  
    @foreach($data as $d)
    <form action="{{ route('pengarang.update',$d->id) }}" method="POST">
        @csrf
        @method('put')

        <div class="form-group">
            <label>Nama</label><input type="text" name="nama" value="{{ $d->nama }}" class="form-control" />
        </div>
        <div class="form-group">
            <label>Email</label><input type="text" name="email" value="{{ $d->email }}" class="form-control" />
        </div>
        <div class="form-group">
            <label>HP</label><input type="text" name="hp" value="{{ $d->hp }}" class="form-control" />
        </div>
        <div class="form-group">
            <label>Foto</label><input type="text" name="foto" value="{{ $d->foto }}" class="form-control" />
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