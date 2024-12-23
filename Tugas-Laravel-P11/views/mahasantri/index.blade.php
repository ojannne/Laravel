@extends('adminlte::page')
@section('title','Data Mahasantri')

@section('content_header')
<h1><i class="fas fa-solid fa-user-graduate">&nbsp;</i>Data Mahasantri</h1>
@stop

@section('content')
@php
$ar_judul = ['No','Nama','NIM','Jurusan','Matakuliah','Dosen Pengajar'];
$no = 1;
@endphp

<a  class="btn btn-primary" href="{{ route('mahasantri.create') }}"
role="button"><i class="fas fa-plus">&nbsp;</i>Tambah mahasantri</a><br/><br/>
<table class="table table-striped">
    <thead>
        <tr>
        @foreach($ar_judul as $jdl)
        <th>{{ $jdl }}</th>
        @endforeach
        </tr>
    </thead>
    <tbody>
@foreach($ar_mahasantri as $mhs)
<tr>
<td>{{ $no++ }}</td>
<td>{{ $mhs->nama }}</td>
<td>{{ $mhs->nim }}</td>
<td>{{ $mhs->jrs }}</td>
<td>{{ $mhs->mk }}</td>
<td>{{ $mhs->dp }}</td>
<td>
<form action="{{ route('mahasantri.destroy',$mhs->id) }}" method="POST">
        @csrf
        @method('delete')
        <a href="{{ route('mahasantri.show',$mhs->id) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
        <a href="{{ route('mahasantri.edit',$mhs->id) }}" class="btn btn-success"><i class="fas fa-solid fa-edit"></i></a>
        <button class="btn btn-danger"
         onclick="return confirm('Anda yakin data di hapus?')"><i class="fas fa-trash"></i></button>
    </form>
</td>
</tr>
@endforeach
</tbody>
</table>
@stop