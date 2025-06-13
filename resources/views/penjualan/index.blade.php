@extends('layouts.app')

@section('title', 'Daftar Penjualan')

@section('content')
<div class="content-wrapper ml-5 pr-5 pt-5">
    <div class="container-fluid pt-2">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-center mb-5">Daftar Penjualan</h1>
                        <a href="{{ route('penjualan.create') }}" class="btn btn-success mb-3"><i class="fas fa-plus"></i> Tambah Penjualan</a>

                        <table class="table table-bordered">
                            <thead class="bg-dark">
                                <tr>
                                    <th>ID Penjualan</th>
                                    <th>Tanggal</th>
                                    <th>Pelanggan</th>
                                    <th>Total Bayar</th>
                                    <th>Dibayar</th>
                                    <th>Kembali</th>
                                    <th>Keuntungan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($penjualans as $penjualan)
                                <tr>
                                    <td>{{ $penjualan->id_penjualan }}</td>
                                    <td>{{ $penjualan->tanggal }}</td>
                                    <td>{{ $penjualan->pelanggan->namapelanggan }}</td>
                                    <td>{{ $penjualan->total_bayar }}</td>
                                    <td>{{ $penjualan->dibayar }}</td>
                                    <td>{{ $penjualan->kembali }}</td>
                                    <td>{{ $penjualan->total_keuntungan }}</td>

                                    <td><a href=" {{ route('penjualan.detail', $penjualan->id_penjualan) }} " class="btn btn-primary btn-sm"><i class="fas fa-info-circle pr-1"></i>Detail Penjualan</a></td>
                                    <!-- <ul>
                                            @foreach($penjualan->detailPenjualan as $detail)
                                            <li>{{ $detail->barang->namabarang }} - {{ $detail->jumlah }} x {{ $detail->harga }}</li>
                                            @endforeach
                                        </ul> -->

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection