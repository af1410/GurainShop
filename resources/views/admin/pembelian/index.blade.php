@extends('admin.layouts.app')

@section('title', 'Daftar Pembelian')

@section('content')
<div class="content-wrapper ml-5 pr-5 pt-5">
    <div class="container-fluid pt-2">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-center mb-5">Daftar Pembelian</h1>
                        <a href="{{ route('admin.pembelian.create') }}" class="btn btn-success mb-3"><i class="fas fa-plus pr-2"></i>Tambah Pembelian</a>

                        <table class="table table-bordered">
                            <thead class="bg-dark">
                                <tr>
                                    <th>ID Pembelian</th>
                                    <th>Tanggal</th>
                                    <th>Suplier</th>
                                    <th>Total Bayar</th>
                                    <th>Dibayar</th>
                                    <th>Kembali</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pembelians as $pembelian)
                                <tr>
                                    <td>{{ $pembelian->id_pembelian }}</td>
                                    <td>{{ $pembelian->tanggal }}</td>
                                    <td>{{ $pembelian->suplier->namasuplier }}</td>
                                    <td>{{ $pembelian->total_bayar }}</td>
                                    <td>{{ $pembelian->dibayar }}</td>
                                    <td>{{ $pembelian->kembali }}</td>
                                    <td>
                                        <a href=" {{ route('admin.pembelian.detail', $pembelian->id_pembelian) }} " class="btn btn-primary btn-sm"><i class="fas fa-info-circle pr-1"></i>Detail Penjualan</a>
                                    </td>
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