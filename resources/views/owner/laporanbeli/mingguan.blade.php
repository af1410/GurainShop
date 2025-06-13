@extends('owner.layouts.app')

@section('title', 'Laporan Bulanan')

@section('content')
<div class="content-wrapper ml-5 pr-5 pt-5">
    <div class="container-fluid pt-2">
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

        <h2 class="text-center mt-3">Laporan Pembelian Mingguan</h2>
        <table class="mb-3">
            <tr>
                <td>Dari Tanggal</td>
                <td> : {{ $tanggalAwal }}</td>
            </tr>
            <tr>
                <td>Sampai Tanggal</td>
                <td> : {{ $tanggalAkhir }}</td>
            </tr>
        </table>
        <button id="printButton" onclick="window.print()" class="btn btn-success mb-3">Print Laporan</button>
        @if($pembelians->isEmpty())
        <p class="text-center">Tidak ada pembelian untuk minggu ini.</p>
        @else
        <table class="table">
            <thead>
                <tr>
                    <th>ID Pembelian</th>
                    <th>Barang</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pembelians as $pembelian)
                @foreach($pembelian->detailPembelian as $detail)
                <tr>
                    <td>{{ $pembelian->id_pembelian }}</td>
                    <td>{{ $detail->barang->namabarang }}</td>
                    <td>{{ $detail->jumlah }}</td>
                    <td>{{ number_format($pembelian->total_bayar) }}</td>
                    <td>{{ $pembelian->created_at }}</td>
                </tr>
                @endforeach
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>
@endsection