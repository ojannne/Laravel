@extends('adminlte::page')
@section('title','Data Pengarang')

@section('content_header')
<h1><i class="fas fa-solid fa-user-graduate">&nbsp;</i>Data Pengarang</h1>
@stop

@section('content')
@php
$ar_judul = ['No','Nama','Email','HP','Foto'];
$no = 1;
@endphp

<a  class="btn btn-primary" href="{{ route('pengarang.create') }}"
role="button"><i class="fas fa-plus">&nbsp;</i>Tambah Pengarang</a><br/><br/>
<table class="table table-striped">
    <thead>
        <tr>
        @foreach($ar_judul as $jdl)
        <th>{{ $jdl }}</th>
        @endforeach
        </tr>
    </thead>
    <tbody>
@foreach($ar_pengarang as $p)
<tr>
<td>{{ $no++ }}</td>
<td>{{ $p->nama }}</td>
<td>{{ $p->email }}</td>
<td>{{ $p->hp }}</td>
<td>{{ $p->foto }}</td>
<td>
<form action="{{ route('pengarang.destroy',$p->id) }}" method="POST">
        @csrf
        @method('delete')
        <a href="{{ route('pengarang.show',$p->id) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
        <a href="{{ route('pengarang.edit',$p->id) }}" class="btn btn-success"><i class="fas fa-solid fa-edit"></i></a>
        <button class="btn btn-danger"
         onclick="return confirm('Anda yakin data di hapus?')"><i class="fas fa-trash"></i></button>
    </form>
</td>
</tr>
@endforeach
</tbody>
</table>
@stop