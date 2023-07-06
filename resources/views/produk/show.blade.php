@extends('adminlte::page')  
@section('title', 'Detail Produk')  
@section('content_header')
    <h1>Detail Produk</h1>  
@stop  
@section('content')
{{-- Ini Konten Detail Data produk --}}  
@foreach($ar_produk as $b)
    <div class="media">
        @php
            if(!empty($b->foto)){
            @endphp
                <img src="{{ asset($b->foto) }}" width="10%" class="mr-3"/>
            @php    
            }else{
            @endphp
                <img src="{{ asset('images') }}/nocover.gif" width="10%" class="mr-3"/>
            @php
            }
            @endphp
        <div class="media-body">
            <h3><u>Nama Produk : {{ $b->nama }}</u></h3>
            <p>
                Harga : {{ $b->harga }}<br/>
                Stok : {{ $b->stok }}<br/>
                Kategori : {{ $b->kategori }}
            </p>
            <hr/><a href="{{ url('/Produk') }}" class="btn btn-info">Go Back</a>
        </div>    
    </div>
@endforeach
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">  
@stop
@section('js')
    <script> console.log('Hi!'); </script>  
@stop