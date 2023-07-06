<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>

<body>

  <!-- Navbar  -->
  <div class="home">
    <nav class="navbar navbar-expand-lg bg- navbar-dark py-3 fixed-top border border border-light  border-3 border-opacity-75  ">
      <div class="container">
        <a class="navbar-brand" href="#">ps<b class="">1998</b></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link " href="/">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="{{ route('user.produk') }}">Produk</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="{{ route('produk.Produk') }}">Login</a>
            </li>
            <li>
              <div class="container">
                <div class="row">
                  <div class="col-lg-12 col-sm-12 col-12">
                    <div class="dropdown">
                      <button type="button" class="btn btn-primary" data-toggle="dropdown">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                      </button>

                      <div class="dropdown-menu">
                        <div class="row total-header-section">
                          @php $total = 0 @endphp
                          @foreach((array) session('cart') as $id => $details)
                          @php $total += $details['harga'] * $details['quantity'] @endphp
                          @endforeach
                          <div class="col-lg-12 col-sm-12 col-12 total-section text-right">
                            <p>Total: <span class="text-info">$ {{ $total }}</span></p>
                          </div>
                        </div>
                        @if(session('cart'))
                        @foreach(session('cart') as $id => $details)
                        <div class="row cart-detail">
                          <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                            <img src="{{ asset('img') }}/{{ $details['foto'] }}" />
                          </div>
                          <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                            <p>{{ $details['nama'] }}</p>
                            <span class="harga text-info"> ${{ $details['harga'] }}</span> <span class="count"> Quantity:{{ $details['quantity'] }}</span>
                          </div>
                        </div>
                        @endforeach
                        @endif
                        <div class="row">
                          <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                            <a href="{{ route('cart') }}" class="btn btn-primary btn-block">View all</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <br />
              <div class="container">

                @if(session('success'))
                <div class="alert alert-success">
                  {{ session('success') }}
                </div>
                @endif

                @yield('content')
              </div>
            </li>
          </ul>

        </div>
      </div>
    </nav>
  </div>


  <!-- endNavbar  -->


  {{-- section --}}
  @yield('container')

  <!--Footer-->
  <section class="last">
    <footer>
      <div class="row ">
        <div class="col"></div>
        <div class="wrapper-col-1 text-center">
          <h1>Follow Kami </h1>

          <img class="m-3" src="img/instragram.png" alt="" width="30" height="30">
          <img class="m-3" src="img/facebook.png" alt="" width="30" height="30">
          <img class="m-3" src="img/Youtube.png" alt="" width="25" height="25">
          <img class="m-3" src="img/email.png" alt="" width="30" height="30">
          <hr>
        </div>
        <div class="row">
          <p class="opacity-50">© Copyright 2023, developed by Mohazm</p>

        </div>
        <div class="col"></div>
        <div class="col"></div>
      </div>
    </footer>
  </section>

  <!--endFooter-->


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</html>