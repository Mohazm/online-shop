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

  <div class="d-grid gap-2 d-md-flex justify-content-md-end m-5">
     <a class="btn btn-danger align-item-end" href="{{ route('user.produk') }}" role="button">Lihat Semua</a>
  </div>

  <hr>

  <div class="all-products">
    @foreach($ar_produk as $b)
    <a href="">
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


<hr>

<h1 class="visually-hidden">Heroes examples</h1>

<div class="px-4 py-5 my-5 text-center">
  <img class="d-block mx-auto mb-4" src="{{asset('img/pommini.png')}}" alt="" width="150" height="150">
  <h1 class="display-5 fw-bold text-body-emphasis">KEUNTUNGAN</h1>
  <div class="col-lg-6 mx-auto">
    <p class="lead mb-4">Sparepart SPBU Pertamina</p>
  </div>
</div>






@endsection