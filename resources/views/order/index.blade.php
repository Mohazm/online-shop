@extends('layouts.main')


@section('content')


<div class="container">
    <table id="cart" class="table table-hover table-condensed">
        <thead>
            <tr>
                <th style="width:50%">Product</th>
                <th style="width:10%">Harga</th>
                <th style="width:8%">Quantity</th>
                <th style="width:22%" class="text-center">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0 @endphp
            @if(session('cart'))
            @foreach(session('cart') as $id => $details)
            @php $total += $details['harga'] * $details['quantity'] @endphp
            <div class="brend">
                <tr data-id="{{ $id }}">
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs"><img src="{{ $details['foto'] }}" width="100" height="100" class="img-responsive" /></div>
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $details['nama'] }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">Rp.{{ $details['harga'] }}</td>
                    <td data-th="Quantity">
                        <p type="number" value="" class="form-control quantity cart_update">{{ $details['quantity'] }}</p>
                    </td>
                    <td data-th="Subtotal" class="text-center">Rp.{{ $details['harga'] * $details['quantity'] }}</td>
                </tr>
            </div>
            @endforeach
            @endif
            <tr>
                <td>
                    <form action="/checkout" method="POST">
                        @csrf
                        <input type="text" name="name" class="form-control" id="name" placeholder="Masukkan nama anda">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="phone" class="form-control" id="phone" placeholder="Masukkan no Hp">
                </td>
            </tr>
            <tr>
                <td>

                    <textarea class="form-control" id="address" rows="3" name="address" placeholder="Masukkan Alamat Anda"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="qty" class="form-label"><b>Harga Keseluruhan</b></label>
                    <input type="text" name="qty" class="form-control" value="{{ $total }}" id="qty" placeholder="Jumlah yang dipesan" readonly>
                </td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5" class="text-right">
                    <h3><strong>Pembayaran Total Rp.{{ $total }}</strong></h3>
                </td>
            </tr>
            <tr>
                <td colspan="5" class="text-right">
                    <a href="{{ url('/') }}" class="btn btn-danger"> <i class="fa fa-arrow-left"></i> Kembali</a>
                    <button class="btn btn-success"><i class="fa fa-money"></i> Checkout</button>
                    </form>
                </td>
            </tr>
        </tfoot>
    </table>
    <!-- <h1 class="my-3">Mypertashop</h1>
    <div class="card" style="width: 18rem;">

        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <form action="/checkout" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="qty" class="form-label">Harga</label>
                    <input type="text" name="qty" class="form-control" value="{{ $total }}" id="qty" placeholder="Jumlah yang dipesan" readonly>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Produk</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Masukkan nama anda">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">NO telp</label>
                    <input type="text" name="phone" class="form-control" id="phone" placeholder="Masukkan no Hp">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Alamat</label>
                    <textarea class="form-control" id="address" rows="3" name="address"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Checkout</button>
            </form>
        </div>
    </div> -->
</div>


@endsection