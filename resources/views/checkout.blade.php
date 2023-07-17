@extends('layouts.main')

@section('title', 'Mypertashop')

@section('content')
<div class="brend">
    <div class="container">
        <table id="cart" class="table table-hover table-condensed">
        <div class="d-flex justify-content-center">
           
                    <h3 class="text-center">Detail Pesanan</h3>
         
                    <table id="cart" class="table table-hover table-condensed">
                        <tr>
                            <td>Nama </td>
                            <td> : {{ $order->name}}</td>
                        </tr>
                        <tr>
                            <td>No Hp </td>
                            <td> : {{ $order->phone}}</td>
                        </tr>
                        <tr>
                            <td>Alamat </td>
                            <td> : {{ $order->address}}</td>
                        </tr>
                        <tr>
                            <td>Total Harga </td>
                            <td> : Rp {{ $order->total_price}}</td>
                        </tr>
                    </table>
                    <button type="submit" id="pay-button" class="btn btn-primary">Bayar Sekarang</button>

            
        </div>
    </div>
</div>


<script type="text/javascript">
    // For example trigger on button clicked, or any time you need
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function() {
        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
        window.snap.pay('{{$snapToken}}', {
            onSuccess: function(result) {
                /* You may add your own implementation here */
                alert("payment success!");
                window.location.href = '/invoice/{{$order->id}}'
                console.log(result);
            },
            onPending: function(result) {
                /* You may add your own implementation here */
                alert("wating your payment!");
                console.log(result);
            },
            onError: function(result) {
                /* You may add your own implementation here */
                alert("payment failed!");
                console.log(result);
            },
            onClose: function() {
                /* You may add your own implementation here */
                alert('you closed the popup without finishing the payment');
            }
        })
    });

    

</script>


@endsection