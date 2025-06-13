@extends('admin.layouts.app')

@section('title', 'Data Barang')

@section('content')
<div class="content-wrapper ml-5 pr-5 mt-5">
    <div class="container-fluid pt-2 ">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow rounded mt-2">
                    <h2 class="text-center pt-4 mb-1 text-primary"><b>Data Barang</b></h2>
                    <div class="card-body">

                        @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span>&times;</span>
                            </button>
                        </div>
                        @endif

                        <table class="table table-borderless mb-3">
                            <tr>
                                <td>
                                    <a href="{{ route('admin.barang.create') }}" class="btn btn-primary shadow-sm">
                                        <i class="fas fa-plus"></i> Tambah
                                    </a>
                                </td>
                                <td class="text-right mr-2">
                                    <a href="{{ route('admin.barang.print') }}" class="btn btn-success shadow-sm">
                                        <i class="bi bi-printer-fill"></i> Print
                                    </a>
                                </td>
                            </tr>
                        </table>

                        <table class="table table-bordered table-hover shadow-sm">
                            <thead class="thead-dark text-center">
                                <tr>
                                    <th>ID Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Harga Barang</th>
                                    <th>Harga Jual</th>
                                    <th>Keuntungan</th>
                                    <th>Jumlah Barang</th>
                                    <th>Satuan Barang</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-center align-middle">
                                @foreach ($barangs as $barang)
                                <tr>
                                    <td>{{ $barang->id_barang }}</td>
                                    <td class="text-left">{{ $barang->namabarang }}</td>
                                    <td><span class="badge badge-info">Rp {{ number_format($barang->hargabarang, 0, ',', '.') }}</span></td>
                                    <td><span class="badge badge-success">Rp {{ number_format($barang->hargajual, 0, ',', '.') }}</span></td>
                                    <td><span class="badge badge-warning">Rp {{ number_format($barang->keuntungan, 0, ',', '.') }}</span></td>
                                    <td><span class="badge badge-secondary">{{ $barang->jumlahbarang }}</span></td>
                                    <td>{{ $barang->satuanbarang }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <a href="{{ route('admin.barang.edit', $barang->id_barang) }}" class="btn btn-info btn-sm mr-1 shadow-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.barang.destroy', $barang->id_barang) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Ingin Menghapus {{ $barang->namabarang }} ?')" class="btn btn-danger btn-sm shadow-sm">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div>
        </div>
    </div>
</div>
@endsection
