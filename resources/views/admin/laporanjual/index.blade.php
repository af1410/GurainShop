@extends('admin.layouts.app')

@section('title', 'Laporan Penjualan')

@section('content')
<div class="content-wrapper ml-5 pr-5 pt-5">
    <div class="container-fluid pt-2">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow rounded">
                    <div class="card-body">
                        <h2 class="text-center mb-5 text-primary"><b>Pilih Jenis Laporan Penjualan</b></h2>

                        <div class="row">
                            <!-- Laporan Harian -->
                            <div class="col-md-4">
                                <div class="border p-4 mb-4 rounded shadow-sm d-flex flex-column h-100">
                                    <form action="{{ route('admin.laporanjual.harian') }}" method="POST" class="flex-grow-1 d-flex flex-column">
                                        @csrf
                                        <h5 class="text-dark"><b>Laporan Harian</b></h5>
                                        <div class="form-group mt-3">
                                            <label for="tanggal_harian">Pilih Tanggal:</label>
                                            <input type="date" class="form-control" name="tanggal" id="tanggal_harian" required>
                                        </div>
                                        <div class="mt-auto">
                                            <button type="submit" class="btn btn-primary btn-block shadow-sm">Cetak Laporan Harian</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- Laporan Mingguan -->
                            <div class="col-md-4">
                                <div class="border p-4 mb-4 rounded shadow-sm d-flex flex-column h-100">
                                    <form action="{{ route('admin.laporanjual.mingguan') }}" method="POST" class="flex-grow-1 d-flex flex-column">
                                        @csrf
                                        <h5 class="text-dark"><b>Laporan Mingguan</b></h5>
                                        <div class="form-group mt-3">
                                            <label for="tanggal_awal">Tanggal Awal:</label>
                                            <input type="date" class="form-control" name="tanggal_awal" id="tanggal_awal" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggal_akhir">Tanggal Akhir:</label>
                                            <input type="date" class="form-control" name="tanggal_akhir" id="tanggal_akhir" required>
                                        </div>
                                        <div class="mt-auto">
                                            <button type="submit" class="btn btn-primary btn-block shadow-sm">Cetak Laporan Mingguan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- Laporan Bulanan -->
                            <div class="col-md-4">
                                <div class="border p-4 mb-4 rounded shadow-sm d-flex flex-column h-100">
                                    <form action="{{ route('admin.laporanjual.bulanan') }}" method="POST" class="flex-grow-1 d-flex flex-column">
                                        @csrf
                                        <h5 class="text-dark"><b>Laporan Bulanan</b></h5>
                                        <div class="form-group mt-3">
                                            <label for="bulan">Pilih Bulan:</label>
                                            <select class="form-control" name="bulan" id="bulan" required>
                                                @for ($i = 1; $i <= 12; $i++)
                                                    <option value="{{ $i }}">{{ date('F', mktime(0, 0, 0, $i, 1)) }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="tahun">Pilih Tahun:</label>
                                            <input type="number" class="form-control" name="tahun" id="tahun" min="2020" max="{{ date('Y') }}" required>
                                        </div>
                                        <div class="mt-auto">
                                            <button type="submit" class="btn btn-primary btn-block shadow-sm">Cetak Laporan Bulanan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div> <!-- End row -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
