@extends('admin.layouts.app')

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

                        <form id="formPembelian" action="{{ route('admin.pembelian.store') }}" method="POST">
                            @csrf

                            <!-- Admin -->
                            <div class="form-group">
                                <label for="id_user">Nama Kasir </label>
                                <input class="form-control" type="text" name="id_user" value="{{ Auth::user()->name }}" readonly>
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
                                            <th>Harga</th>
                                            <th>Jumlah</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($barangs as $barang)
                                        <tr class="barang-row">
                                            <td class="nama-barang">{{ $barang->namabarang }}</td>
                                            <td>
                                                <input type="text" name="barang[{{ $barang->id_barang }}][hargabarang]" value="{{ $barang->hargabarang }}" class="form-control" readonly>
                                            </td>
                                            <td>
                                                <input type="number" name="barang[{{ $barang->id_barang }}][jumlah]" class="form-control jumlah-barang" min="0" value="0" data-harga="{{ $barang->hargabarang }}">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control total-harga" readonly value="{{ $barang->hargabarang }}">
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

                            <!-- Kembali -->
                            <div class="form-group">
                                <label for="kembali">Kembali</label>
                                <input type="text" name="kembali" id="kembali" class="form-control" readonly>
                            </div>

                            <!-- Buttons -->
                            <div class="form-group row center">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-3">
                                    <a href="{{ route('admin.pembelian.index') }}" class="btn btn-primary px-3">
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
                                    <button type="button" class="btn btn-success px-3" id="btnSimpan">
                                        <i class="fa fa-save"></i>
                                        Simpan
                                    </button>
                                </div>
                            </div>
                        </form>

                        <!-- Modal Cetak Nota -->
                        <div class="modal fade" id="modalCetakNota" tabindex="-1" role="dialog" aria-labelledby="modalCetakNotaLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalCetakNotaLabel">Cetak Nota</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah Anda ingin mencetak nota?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnTidakCetak">Tidak</button>
                                        <button type="button" class="btn btn-primary" id="btnCetakNota">Cetak Nota</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                const searchInput = document.getElementById('search-barang');
                                const rows = document.querySelectorAll('.barang-row');

                                searchInput.addEventListener('input', function() {
                                    const searchTerm = searchInput.value.toLowerCase();
                                    rows.forEach(row => {
                                        const namaBarang = row.querySelector('.nama-barang').textContent.toLowerCase();
                                        if (namaBarang.includes(searchTerm)) {
                                            row.style.display = '';
                                        } else {
                                            row.style.display = 'none';
                                        }
                                    });
                                });

                                const jumlahBarangInputs = document.querySelectorAll('.jumlah-barang');
                                const totalHargaInputs = document.querySelectorAll('.total-harga');
                                const totalBayarInput = document.getElementById('total_bayar');
                                const dibayarInput = document.getElementById('dibayar');
                                const kembaliInput = document.getElementById('kembali');

                                function calculateTotal() {
                                    let totalBayar = 0;
                                    jumlahBarangInputs.forEach((input, index) => {
                                        const jumlah = parseInt(input.value);
                                        const harga = parseFloat(input.getAttribute('data-harga'));
                                        const totalHarga = jumlah * harga;
                                        totalHargaInputs[index].value = totalHarga.toFixed(0);
                                        totalBayar += totalHarga;
                                    });
                                    totalBayarInput.value = totalBayar.toFixed(0);
                                }

                                jumlahBarangInputs.forEach(input => {
                                    input.addEventListener('input', calculateTotal);
                                });

                                dibayarInput.addEventListener('input', function() {
                                    const totalBayar = parseFloat(totalBayarInput.value);
                                    const dibayar = parseFloat(dibayarInput.value);
                                    const kembali = dibayar - totalBayar;
                                    kembaliInput.value = kembali.toFixed(0);
                                });

                                // Hitung total awal
                                calculateTotal();

                                const form = document.getElementById('formPembelian');
                                const btnSimpan = document.getElementById('btnSimpan');
                                const modalCetakNota = $('#modalCetakNota');

                                // Cegah submit form secara langsung saat tombol Simpan diklik
                                btnSimpan.addEventListener('click', function(event) {
                                    event.preventDefault(); // Mencegah form submit langsung
                                    modalCetakNota.modal('show'); // Menampilkan modal cetak nota
                                });

                                // Jika pilih Cetak Nota
                                document.getElementById('btnCetakNota').addEventListener('click', function() {
                                    let input = document.createElement('input');
                                    input.type = 'hidden';
                                    input.name = 'cetak_nota';
                                    input.value = '1'; // Tanda cetak nota
                                    form.appendChild(input);

                                    // Kirim form secara asinkron menggunakan AJAX
                                    const formData = new FormData(form);
                                    fetch(form.action, {
                                            method: 'POST',
                                            body: formData
                                        })
                                        .then(response => response.json())
                                        .then(data => {
                                            // Redirect ke halaman detail pembelian setelah berhasil disimpan
                                            if (data.id_pembelian) {
                                                const urlDetailPembelian = `{{ route('admin.pembelian.detail', ':id_pembelian') }}`.replace(':id_pembelian', data.id_pembelian);
                                                window.location.href = urlDetailPembelian;
                                            }
                                        })
                                        .catch(error => console.error('Error:', error));
                                });


                                // Jika pilih Tidak Cetak
                                document.getElementById('btnTidakCetak').addEventListener('click', function() {
                                    // Kirim form tanpa menggunakan AJAX
                                    form.submit(); // Kirim form untuk kembali ke index
                                });
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection