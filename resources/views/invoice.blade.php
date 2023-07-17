<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>

    <div class="d-flex justify-content-center mt-5">
        <div class="card" style="width: 18rem;">
            <div class="card-header text-center">
                Pembayaran Sukses
            </div>
            <div class="card-body">
                <h5 class="card-title">Detail Pesanan</h5>
                <table>
                    <tr>
                        <td>Nama</td>
                        <td> : {{$order->name}}</td>
                    </tr>
                    <tr>
                        <td>No Hp</td>
                        <td> : {{$order->phone}}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td> : {{$order->address}}</td>
                    </tr>
                    <tr>
                        <td>Total Harga</td>
                        <td> : {{$order->total_price}}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td> : {{$order->status}}</td>
                    </tr>
                    <tr class="mt-2">
                        <td> <a href="/" class="btn btn-primary mt-2 ">Kembali</a></td>
                    </tr>
            </div>

        </div>

    </div>
    </div>


</body>

</html>