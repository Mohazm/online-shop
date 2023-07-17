@extends('layouts.main')

@section('title', 'Mypertashop')

@section('container')
<!-- card -->
<div class="brend">
  <section class="products">
    <h2>Our Products</h2>
    <div class="all-products">
      @foreach($ar_produk as $b)
      <a href="#">
        <div class="product">
          <img src="{{ $b->foto }}">
          <div class="product-info">
            <h4 class="product-title">{{ $b->nama }}</h4>
            <p class="product-price">Rp {{ $b->harga }}</p>
            <p class="btn-holder"><a href="{{ route('add_to_cart', $b->id) }}" class="btn btn-primary btn-block text-center" role="button">Tambah Keranjang</a> </p>
          </div>
      </a>
    </div>
       @endforeach
  
 </section>
 </div> 

@endsection