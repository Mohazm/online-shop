@extends('adminlte::page')
@section('title','Data Kategori')
@section('content_header')
    <h1>Data Kategori</h1>
@stop
@section('content') 
{{-- Isi Konten Data Kategori --}}
@php
$ar_judul = ['No','Nama'];
$no = 1;  @endphp
    <!-- <a class="btn btn-primary" href="{{ route('kategori.create') }}"
    role="button">Tambah</a>&nbsp;&nbsp;&nbsp; -->
    <a class="btn btn-secondary btn-md" href="{{ '/home' }}" role="button">Back</a><br/><br/>
    <table class="table table-striped">
    <thead>
    <tr>
    @foreach($ar_judul as $jdl)
    <th>{{ $jdl }}</th>  @endforeach
    </tr>
    </thead>
    <tbody>
@foreach($ar_kategori as $ktg)
    <tr>
    <td>{{ $no++ }}</td>
    <td>{{ $ktg->nama }}</td>
    </tr>
    @endforeach
    </tbody>
    </table>
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
    <script> console.log('Hi!'); </script>