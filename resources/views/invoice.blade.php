<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="invoice.css">
</head>

<body>
<button type="button" class="btn btn-link"> <a href="mailto:mohamadalit24@gmail.com?subject= Saran : .......">Saran & Masukkan</a></button>
<button type="button" class="btn btn-link" onclick="printStruk()">Cetak</button>
<button type="button" class="btn btn-link"><a href="/" >Kembali</a></button>
    <div class="d-flex justify-content-center mt-5">
        <div class="card">
            <div class="card-header text-center">
                Pembayaran Sukses
            </div>
            <div class="card-body">
                <h1 class="text-center">Sparepart SPBU</h1>
                <p class="text-center">Ciracas, Jakarta Timur </p>       
                <table>
                    <tr>
                        <td>
                            <p>=============</p>
                            <p>=============</p>
                        </td>
                        <td>
                            <p>=============</p>
                            <p>=============</p>
                        </td>
                        <td>
                            <p>=============</p>
                            <p>=============</p>
                        </td>
                    </tr>
                    <tr class="text-end">
                        <td></td>
                        <td></td>
                        <td>
                            <p>{{$order->created_at}}</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>=============</p>
                            <p>=============</p>
                        </td>
                        <td>
                            <p>=============</p>
                            <p>=============</p>

                        </td>
                        <td>
                            <p>=============</p>
                            <p>=============</p>

                        </td>
                    </tr>
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
                        <td> : Rp. {{$order->total_price}}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td> : {{$order->status}}</td>
                    </tr>
                    <tr>
                        <td>
                            <p>=============</p>
                            <p>=============</p>
                        </td>
                        <td>
                            <p>=============</p>
                            <p>=============</p>

                        </td>
                        <td>
                            <p>=============</p>
                            <p>=============</p>

                        </td>
                    </tr>

                    <tr>
                        <td colspan="2"><p>Terima kasih atas pembelian Anda!</p></td>
                    </tr>
            </div>
        </div>
    </div>




</body>
<!-- Tambahkan di akhir berkas body -->
<script>
    window.onload = function() {
        window.print();
    };
    function printStruk() {
      window.print();
    }

</script>

</html>