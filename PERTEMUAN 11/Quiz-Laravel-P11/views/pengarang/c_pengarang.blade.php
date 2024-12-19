@extends('adminlte::page')
@section('tittle','𝖥𝗈𝗋𝗆 Pengarang')

@section('content_header')
@section('content')
<h1>
    <h1><i class="fas fa-list"></i>
        Form Pengarang</h1>
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

    @php
    $rs1 = App\Models\pengarang::all();
    @endphp
    
    <form action="{{ route('pengarang.store')}}" method="POST">
        @csrf
        {{-- cross-site request forgery (CSRF) = pencegahan serangan yang dilakukan oleh pengguna yang tidak terautentikasi --}}
        <div class="form-group">
           <label>Nama</label><input type="text" name="nama" class="form-control">
        </div>
        <div class="form-group">
           <label>Email</label><input type="text" name="email" class="form-control">
        </div>
       
        <div class="form-group">
           <label>HP</label><input type="text" name="hp" class="form-control">
        </div>
        </div>        
        <div class="form-group">
           <label>Foto</label><input type="text" name="foto" class="form-control">
        </div>            
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