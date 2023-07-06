@extends('adminlte::page')
@section('title', 'Form produk')
@section('content_header')
<h1>Input Data produk</h1><br />
<a class="btn btn-secondary btn-md" href="{{ '/Produk' }}" role="button">Back</a><br /><br />
<table class="table table-striped">
    @stop
    @section('content')
    {{-- Ini Konten Form Input produk --}}
    {{-- Panggil master data produk, penerbit dan kategori untuk
ditampilkan di element form --}}
    @php
    $rs1 = App\Models\produk::all();
    $rs3 = App\Models\Kategori::all();
    @endphp
    <form method="POST" enctype="multipart/form-data" action="{{ route('Produk.store') }}">
        @csrf {{-- security untuk menghindari dari serangan pada saat input form --}}

        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required />
            <label>Harga</label>
            <input type="text" name="harga" class="form-control" required />
            <label>Stok</label>
            <input type="text" name="stok" class="form-control" required />
        </div>
        {{-- Panggil master data produk untuk ditampilkan di element form select --}}
        <label>Foto</label>
        <input type="file" name="image" class="form-control" />
        <div class="form-group">
            <label>Kategori</label><br /> 
            @foreach($rs3 as $k)
                <input type="radio" name="idkategori" value="{{ $k->id }}" />{{ $k->nama }} &nbsp; &nbsp;
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary" name="proses">Simpan</button>

        <button type="reset" class="btn btn-warning" name="unproses">Batal</button>

        @stop
        @section('css')
        <link rel="stylesheet" href="/css/admin_custom.css">
        @stop
        @section('js')
        <script>
            console.log('Hi!');
        </script>
        @stop