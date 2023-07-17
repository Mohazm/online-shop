@extends('adminlte::page')
@section('title','Data Kategori')
@section('content_header')
<h1>Data Order</h1>
@stop
@section('content')
{{-- Isi Konten Data Kategori --}}
@php
$ar_jdl = ['No','Nama','Alamat','Handphone','Total Harga','Status'];
$no = 1; @endphp
<!-- <a class="btn btn-primary" href="{{ route('kategori.create') }}"
    role="button">Tambah</a>&nbsp;&nbsp;&nbsp; -->
<a class="btn btn-secondary btn-md" href="{{ '/home' }}" role="button">Back</a><br /><br />
<table class="table table-striped">
    <thead>
        <tr>
            @foreach($ar_jdl as $jdl)
            <th>{{ $jdl }}</th> @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($ar_produk as $odr)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $odr->name }}</td>
            <td>{{ $odr->address }}</td>
            <td>{{ $odr->phone }}</td>
            <td>{{ $odr->total_price}}</td>
            <td>{{ $odr->status}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $ar_produk->links() }}
@stop
@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
<script>
    console.log('Hi!');
</script>