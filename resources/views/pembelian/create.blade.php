@extends('layouts.app')

@section('title', 'Tambah Pembelian')

@section('content')
<div class="content-wrapper ml-5 pr-5 pt-5">
    <div class="container-fluid pt-2">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-center mb-5">Tambah Pembelian</h1>
                        <!-- Alert untuk pesan sukses -->
                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif

                        <!-- Alert untuk pesan error -->
                        @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form id="formPembelian" action="{{ route('pembelian.store') }}" method="POST">
                            @csrf

                            <!-- Admin -->
                            <div class="form-group">
                                <label for="id_user">Nama Kasir </label>
                                <!-- Input hidden untuk mengirimkan ID user -->
                                <input type="hidden" name="id_user" value="{{ Auth::user()->id }}" hidden>
                                <input class="form-control" type="text" value="{{ Auth::user()->name }}" readonly>
                            </div>

                            <!-- Suplier -->
                            <div class="form-group">
                                <label for="id_suplier">Suplier</label>
                                <select name="id_suplier" class="form-control">
                                    @foreach($supliers as $suplier)
                                    <option value="{{ $suplier->id_suplier }}">{{ $suplier->namasuplier }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Cari Barang -->
                            <div class="form-group">
                                <label for="search-barang">Cari Barang</label>
                                <input type="text" id="search-barang" class="form-control" placeholder="Masukkan nama barang untuk mencari...">
                            </div>

                            <!-- Data Barang -->
                            <div class="form-group">
                                <label>Barang</label>
                                <table class="table" id="dataGrid">
                                    <thead>
                                        <tr>
                                            <th>Nama Barang</th>
                                            <th>Harga Barang</th>
                                            <th>Keuntungan (10%)</th>
                                            <th>Harga Jual</th>
                                            <th>Jumlah</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($barangs as $barang)
                                        <tr class="barang-row">
                                            <td class="nama-barang">{{ $barang->namabarang }}</td>
                                            <td>
                                                <input type="text" name="barang[{{ $barang->id_barang }}][hargabarang]" value="{{ $barang->hargabarang }}" class="form-control harga-barang" readonly>
                                            </td>
                                            <td>
                                                <input type="text" id="keuntungan" name="keuntungan" class="form-control keuntungan-barang" readonly>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control harga-jual-barang" readonly>
                                            </td>
                                            <td>
                                                <input type="number" name="barang[{{ $barang->id_barang }}][jumlah]" class="form-control jumlah-barang" min="0" value="0" data-harga="{{ $barang->hargabarang }}">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control total-harga" readonly>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <!-- Total Bayar -->
                            <div class="form-group">
                                <label for="total_bayar">Total Bayar</label>
                                <input type="text" name="total_bayar" id="total_bayar" class="form-control" readonly>
                            </div>

                            <!-- Dibayar -->
                            <div class="form-group">
                                <label for="dibayar">Dibayar</label>
                                <input type="text" name="dibayar" id="dibayar" class="form-control">
                            </div>

                            <!-- Buttons -->
                            <div class="form-group row center">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-3">
                                    <a href="{{ route('pembelian.index') }}" class="btn btn-primary px-3">
                                        <i class="fa fa-arrow-left"></i>
                                        Kembali
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                    <button type="reset" class="btn btn-danger px-4">
                                        <i class="fa fa-redo"></i>
                                        Reset
                                    </button>
                                </div>
                                <div class="col-sm-3">
                                    <button type="submit" class="btn btn-success px-3">
                                        <i class="fa fa-save"></i>
                                        Simpan
                                    </button>
                                </div>
                            </div>
                        </form>

                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                const jumlahBarangInputs = document.querySelectorAll('.jumlah-barang');
                                const totalHargaInputs = document.querySelectorAll('.total-harga');
                                const keuntunganInputs = document.querySelectorAll('.keuntungan-barang');
                                const hargaJualInputs = document.querySelectorAll('.harga-jual-barang');
                                const totalBayarInput = document.getElementById('total_bayar');
                                const dibayarInput = document.getElementById('dibayar');

                                function calculateTotals() {
                                    let totalBayar = 0;
                                    jumlahBarangInputs.forEach((input, index) => {
                                        const jumlah = parseInt(input.value) || 0;
                                        const harga = parseFloat(input.getAttribute('data-harga')) || 0;
                                        const keuntungan = harga * 0.1;
                                        const hargaJual = harga + keuntungan;
                                        const totalHarga = jumlah * hargaJual;

                                        keuntunganInputs[index].value = keuntungan.toFixed(0);
                                        hargaJualInputs[index].value = hargaJual.toFixed(0);
                                        totalHargaInputs[index].value = totalHarga.toFixed(0);
                                        totalBayar += totalHarga;
                                    });
                                    totalBayarInput.value = totalBayar.toFixed(0);
                                }

                                jumlahBarangInputs.forEach(input => {
                                    input.addEventListener('input', calculateTotals);
                                });

                                dibayarInput.addEventListener('input', function() {
                                    const totalBayar = parseFloat(totalBayarInput.value) || 0;
                                    const dibayar = parseFloat(dibayarInput.value) || 0;
                                    const kembali = dibayar - totalBayar;

                                    // Informasi kembalian dihapus, jika diperlukan nanti tambahkan
                                    console.log('Kembalian:', kembali);
                                });

                                // Hitung total awal
                                calculateTotals();
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection