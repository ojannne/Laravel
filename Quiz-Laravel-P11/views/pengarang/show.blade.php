@extends('adminlte::page')
@section('tittle','Detail Pengarang')

@section('content_header')
@section('content')
<h1>
    <h1><i class="fas fa-book"></i>
        Detail Pengarang</h1>
    <a href="{{ route('pengarang.index')}}" class="btn btn-primary btn-md" role="button"><i class="fas fa-arrow-left"></i> Back</a><br><br>
    
  
    
    @foreach($ar_pengarang as $p)
    <form>
        @csrf
        <div class="form-group">
            <label>Nama</label><input type="text" placeholder="{{ $p->nama }}"  class="form-control" disabled/>
        </div>
        <div class="form-group">
            <label>Email</label><input type="text" placeholder="{{ $p->email }}" class="form-control" disabled/>
        </div>
        <div class="form-group">
           <label>HP</label><input type="text"  placeholder="{{ $p->hp }}" class="form-control" disabled/>
        </div>      
        <div class="form-group">
           <label>Foto</label><input type="text"  placeholder="{{ $p->foto }}" class="form-control" disabled/>
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