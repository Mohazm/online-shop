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
   <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
   <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{config('midtrans.client_key')}}"></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
</head>

<body>

  <!-- Navbar  -->
  
  <!-- <div class="home">
    <nav class="navbar navbar-expand-lg bg- navbar-dark py-3 fixed-top border border border-light  border-3 border-opacity-75 ">
      <div class="container">
        <a class="navbar-brand" href="#">ps<b class="">1998</b></a>
        <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto align-item-center">
            <li class="nav-item ">
              <a class="nav-link " href="/">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="{{ route('user.produk') }}">Produk</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="{{ route('produk.Produk') }}">Login</a>
            </li>
            <li>
                <div class="row">
                  <div class="col-lg-12 col-sm-12 col-12">
                    <div class="dropdown">
                      <button type="button" class="btn btn-danger" data-toggle="dropdown">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i><img src="{{asset('img/icon _cart.png')}}" alt="" width="25" height="25"><span class="badge badge-pill badge-danger"> {{ count((array) session('cart')) }}</span>
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
                            <img src="{{ $details['foto'] }}" />
                          </div>
                          <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                            <p>{{ $details['nama'] }}</p>
                            <span class="harga text-info"> Rp.{{ $details['harga'] }}</span> <span class="count"> Quantity:{{ $details['quantity'] }}</span>
                          </div>
                        </div>
                        @endforeach
                        @endif
                        <div class="row">
                          <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                            <a href="{{ route('cart') }}" class="btn btn-primary btn-block">Lihat Semua</a>
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

                
              </div>
            </li>
          </ul>

        </div>
      </div>
    </nav>
  </div> -->
  <div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
        <img class="d-block mx-auto mb-4" src="{{asset('img/pommini.png')}}" alt="" width="50" height="50">
      </a>

      <ul class="nav nav-pills">
        <li class="nav-item"><a href="/" class="nav-link" aria-current="page">Home</a></li>
        <li class="nav-item"><a href="{{ route('user.produk') }}" class="nav-link " aria-current="page">Produk</a></li>
        <li class="nav-item"><a href="{{ route('produk.Produk') }}" class="nav-link " aria-current="page">Login</a></li>
        <li class="nav-item">   
          <div class="row">
                  <div class="col-lg-12 col-sm-12 col-12">
                    <div class="dropdown">
                      <button type="button" class="btn btn-danger" data-toggle="dropdown">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i><img src="{{asset('img/icon _cart.png')}}" alt="" width="25" height="25"><span class="badge badge-pill badge-danger"> {{ count((array) session('cart')) }}</span>
                      </button>

                      <div class="dropdown-menu">
                        <div class="row total-header-section">
                          @php $total = 0 @endphp
                          @foreach((array) session('cart') as $id => $details)
                          @php $total += $details['harga'] * $details['quantity'] @endphp
                          @endforeach
                          <div class="col-lg-12 col-sm-12 col-12 total-section text-right">
                            <p>Total: <span class="text-info">Rp. {{ $total }}</span></p>
                          </div>
                        </div>
                        @if(session('cart'))
                        @foreach(session('cart') as $id => $details)
                        <div class="row cart-detail">
                          <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                            <img src="{{ $details['foto'] }}" />
                          </div>
                          <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                            <p>{{ $details['nama'] }}</p>
                            <span class="harga text-info"> Rp.{{ $details['harga'] }}</span> <span class="count"> Quantity:{{ $details['quantity'] }}</span>
                          </div>
                        </div>
                        @endforeach
                        @endif
                        <div class="row">
                          <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                            <a href="{{ route('cart') }}" class="btn btn-primary btn-block">Lihat Semua</a>
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

                
              </div>
            </li>
      </ul>
    </header>
  </div>


  
  @yield('content')
  <!-- endNavbar  -->
  
  
  @yield('container')


  @yield('scripts')

  <!--Footer-->
  <section class="last">
    <footer class="mb-auto">
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

<script type="text/javascript">
   
    $(".cart_update").change(function (e) {
        e.preventDefault();
   
        var ele = $(this);
   
        $.ajax({
            url: "{{ route('update_cart') }}",
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents("tr").attr("data-id"), 
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function (response) {
               window.location.reload();
            }
        });
    });
   
    $(".cart_remove").click(function (e) {
        e.preventDefault();
   
        var ele = $(this);
   
        if(confirm("Do you really want to remove?")) {
            $.ajax({
                url: "{{ route('remove_from_cart') }}",
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });
   
</script>

</html>