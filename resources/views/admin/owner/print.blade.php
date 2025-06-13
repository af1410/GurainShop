<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Laporan Data Barang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .kop {
            text-align: center;
            margin-bottom: 20px;
        }

        .kop img {
            width: 100px;
            height: auto;
        }

        .kop h1,
        .kop h2,
        .kop h3 {
            margin: 0;
        }

        .kop h1 {
            font-size: 40px;
            margin-bottom: 5px;
        }

        .kop h2 {
            font-size: 20px;
            margin-bottom: 5px;
        }

        .kop h3 {
            font-size: 16px;
            margin-bottom: 5px;
        }

        .line {
            border-top: 2px solid black;
            margin-top: 10px;
        }

        .line-thin {
            border-top: 1px solid black;
            margin-top: 2px;
        }
    </style>
</head>

<body>

    <div class="kop">
        <!-- Ganti dengan logo perusahaan -->
        <h1 style=" margin-top: 20px;"><b>Toko Gurain Shop</b></h1>
        <h2>Jl. Letnan Adun Rt. 06 Rw. 05 Ds. Rancaekek Kulon Kec. Rancaekek</h2>
        <h3>Telepon: 089602925233 | Email: berkahibu@gmail.com</h3>
    </div>

    <div class="line"></div>
    <div class="line-thin"></div>

    <h2 style="text-align: center; margin-top: 20px;"><b>Laporan Data Owner</b></h2>
    <br>
    <table class="table table-bordered-4">
        <thead class="thead-dark mr-5 ml-5">
            <tr>
                <th>No</th>
                <th>Kode Owner</th>
                <th>Nama</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach ($owners as $owner)
            <tr>
                <th>{{ $no++ }}</th>
                <th>{{ $owner->kode_owner }}</th>
                <th>{{ $owner->name }}</th>
                <th>{{ $owner->email }}</th>
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