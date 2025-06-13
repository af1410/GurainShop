<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Laporan Data Kasir</title>
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

    <h2 style="text-align: center; margin-top: 20px;"><b>Laporan Data Kasir</b></h2>
    <br>
    <table class="table table-bordered-4">
        <thead class="thead-dark mr-5 ml-5">
            <tr>
                <th>No</th>
                <th>Kode Kasir</th>
                <th>Nama</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach ($users as $user)
            <tr>
                <th>{{ $no++ }}</th>
                <th>{{ $user->kode_kasir }}</th>
                <th>{{ $user->name }}</th>
                <th>{{ $user->email }}</th>
            </tr>
            @endforeach
        </tbody>
    </table>
    <script>
        window.print();
    </script>

    <!-- jQuery -->
    <script src="{{ asset('vendor/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('vendor/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>