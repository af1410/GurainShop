<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laporan Data Barang</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .kop {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
        }

        .kop img {
            width: 100px;
            height: auto;
            margin-right: 20px;
        }

        .kop .text {
            text-align: left;
        }

        .kop h1 {
            font-size: 28px;
            margin: 0;
            font-weight: bold;
        }

        .kop h2 {
            font-size: 16px;
            margin: 2px 0;
        }

        .kop h3 {
            font-size: 14px;
            margin: 2px 0;
        }

        .line {
            border-top: 2px solid black;
            margin-top: 5px;
        }

        .line-thin {
            border-top: 1px solid black;
            margin-top: 2px;
            margin-bottom: 20px;
        }

        h2.judul {
            text-align: center;
            font-weight: bold;
            margin-top: 20px;
        }

        table th, table td {
            text-align: center;
            font-size: 14px;
        }
    </style>
</head>

<body>

    <div class="kop">
        <img src="{{ asset('img/GurainShop.png') }}" alt="Logo Gurain Shop">
        <div class="text">
            <h1>Toko Gurain Shop</h1>
            <h2>Kp. Gunung Leutik, RT. 01 RW. 10 Nagreg</h2>
            <h3>Telepon: 0881-0226-70083 | Email: gurainshop@gmail.com</h3>
        </div>
    </div>

    <div class="line"></div>
    <div class="line-thin"></div>

    <h2 class="judul">Laporan Data Barang</h2>
    <br>

    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>Keuntungan</th>
                <th>Jumlah</th>
                <th>Satuan</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach ($barangs as $barang)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $barang->id_barang }}</td>
                <td>{{ $barang->namabarang }}</td>
                <td>{{ number_format($barang->hargabarang, 0, ',', '.') }}</td>
                <td>{{ number_format($barang->hargajual, 0, ',', '.') }}</td>
                <td>{{ number_format($barang->keuntungan, 0, ',', '.') }}</td>
                <td>{{ $barang->jumlahbarang }}</td>
                <td>{{ $barang->satuanbarang }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        window.print();
    </script>

</body>
</html>
