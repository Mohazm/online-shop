@extends('adminlte::page')
@section('title','Daftar Produk')
@section('content_header')
<h1>Daftar Produk</h1>
@stop
@section('content')
{{-- Isi Konten Data produk --}}
@php
$ar_judul = ['No','Nama','Email','No HP','Foto','Action'];
$no = 1; @endphp
<a class="btn btn-primary" href="{{ route('produk.create') }}" role="button">Tambah</a>&nbsp;&nbsp;&nbsp;
<a class="btn btn-secondary btn-md" href="{{ '/home' }}" role="button">Back</a><br /><br />
<table class="table table-striped">
    <thead>
        <tr>
            @foreach($ar_judul as $jdl)
            <th>{{ $jdl }}</th> @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($ar_produk as $pgr)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $pgr->nama }}</td>
            <td>{{ $pgr->harga }}</td>
            <td>{{ $pgr->idkategori }}</td>
            <td width="10%">
                @php
                if(!empty($pgr->foto)){
                @endphp
                <img src="{{ asset('images')}}/{{ $pgr->foto }}" width="10%" class="card-img-top" />
                @php
                }else{
                @endphp
                <img src="{{ asset('images')}}/nophoto.jpg" width="10%" class="card-img-top" />
                @php
                }
                @endphp
            </td>
            <td>
                <form action="{{ route('produk.destroy',$pgr->id) }}" method="POST">
                    @csrf {{-- security untuk menghindari dari serangan pada saat input form --}}
                    @method('delete') {{-- method delete digunakan untuk menghapus data --}}
                    <a class="btn btn-info btn-sm me-2" href="{{ route('produk.show',$pgr->id)}}"><i class="fas fa-eye"></i></a>
                    <a class="btn btn-success btn-sm me-2" href="{{ route('produk.edit',$pgr->id)}}"><i class="fas fa-pen"></i></a>
                    <button class="btn btn-danger btn-sm me-2" onclick="return confirm('Anda Yakin Data Dihapus')"><i class="fas fa-trash"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop
@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
<script>
    console.log('Hi!');
</script>