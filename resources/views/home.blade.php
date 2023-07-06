@extends('layouts.main')

@section('title', 'Mypertashop')

@section('container')
<!-- Background image -->
<div class="bg-image d-flex justify-content-center align-items-center" style="
    background: url(img/pertashop.png);
    height: 100vh;
    background-repeat: no-repeat;
    background-size: cover;
  ">`
  <div class="container ">
    <div class="d-sm-flex align-items-center justify-content-between ">
      <div>
        

      </div>

    </div>
  </div>
</div>
<br>
<br>


<!-- card -->
<section class="products">
  <h3 class="text-center">Di sarankan untuk anda :</h3>

  <div class="all-products">
  @foreach($ar_produk as $b)
 <a href="https://shopee.co.id/">
    <div class="product"> 
      <img src="{{ $b->foto }}">
      <div class="product-info">
        <h4 class="product-title">{{ $b->nama }}</h4>
        <p class="product-price">Rp {{ $b->harga }}</p>
      </div>
    </a>
    </div>
    @endforeach
  
</section>



@endsection