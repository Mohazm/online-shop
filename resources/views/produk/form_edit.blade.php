@extends('adminlte::page')
@section('title', 'Form Produk')
@section('content_header')
<h1>Form Edit Produk</h1><br />
<a class="btn btn-secondary btn-md" href="{{ '/Produk' }}" role="button">Back</a><br /><br />
<table class="table table-striped">
    @stop
    @section('content')
    {{-- Ini Konten Form Input Produk --}}
    @php
    $rs1 = App\Models\produk::all();
    $rs3 = App\Models\Kategori::all();
    @endphp
    @foreach($data as $rs)
    <form method="POST" action="{{ route('Produk.update',$rs->id) }}" enctype="multipart/form-data">
        @endforeach
        @csrf {{-- security untuk menghindari dari serangan pada saat input form --}}
        @method('put') {{-- method put digunakan untuk meletakkan data yang akan diubah
disetiap element form edit Produk --}}
        <div class="form-group">
            <label>Nama Produk</label>
            <input type="text" name="nama" value="{{ $rs->nama }}" class="form-control" /><br />
            <label>Harga</label>
            <input type="text" name="harga" value="{{ $rs->harga }}" class="form-control" /><br />
            <label>Stok</label>
            <input type="text" name="stok" value="{{ $rs->stok }}" class="form-control" /><br />
            <label>Kategori</label><br />
            @foreach($rs3 as $k)
            <input type="radio" name="idkategori" value="{{ $k->id }}" {{ $k->id == $rs->idkategori ? 'checked' : '' }}>{{ $k->nama }} &nbsp; &nbsp;
            @endforeach <br>
            <label class="mt-3">Foto</label>
            <input type="file" name="foto" class="form-control" />
            @if ($rs->foto)
            <br />
            <label>Foto Saat Ini:</label><br />
            <img src="{{ asset( $rs->foto) }}" alt="Current Foto" style="max-height: 200px;">
            @endif
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