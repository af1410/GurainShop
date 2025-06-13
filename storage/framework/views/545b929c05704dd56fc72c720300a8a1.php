

<?php $__env->startSection('title', 'Tambah Penjualan'); ?>

<?php $__env->startSection('content'); ?>
<div class="content-wrapper ml-5 pr-5 pt-5">
    <div class="container-fluid pt-2">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-center mb-5">Tambah Penjualan</h1>

                        <form action="<?php echo e(route('admin.penjualan.store')); ?>" method="POST" id="formPenjualan">
                            <?php echo csrf_field(); ?>

                            <div class="form-group">
                                <label for="id_pelanggan">Admin</label>
                                <input class="form-control" type="text" name="id_user" value="<?php echo e(Auth::user()->name); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="id_pelanggan">Pelanggan</label>
                                <select name="id_pelanggan" class="form-control">
                                    <?php $__currentLoopData = $pelanggans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pelanggan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($pelanggan->id_pelanggan); ?>"><?php echo e($pelanggan->namapelanggan); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <!-- Pencarian Barang -->
                            <div class="form-group">
                                <label>Cari Barang</label>
                                <input type="text" id="search-barang" class="form-control" placeholder="Cari barang...">
                            </div>

                            <!-- Tabel Barang -->
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
                                        <?php $__currentLoopData = $barangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $barang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="barang-row">
                                            <td><?php echo e($barang->namabarang); ?></td>
                                            <td>
                                                <input type="text" name="barang[<?php echo e($barang->id_barang); ?>][hargajual]" value="<?php echo e($barang->hargajual); ?>" class="form-control" readonly>
                                            </td>
                                            <td>
                                                <input type="number" name="barang[<?php echo e($barang->id_barang); ?>][jumlah]" class="form-control jumlah-barang" min="0" value="0" data-harga="<?php echo e($barang->hargajual); ?>" data-keuntungan="<?php echo e($barang->keuntungan); ?>">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control total-harga" readonly value="<?php echo e($barang->hargajual); ?>">
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

                            <div class="form-group">
                                <input type="text" name="total_keuntungan" id="total_keuntungan" class="form-control" readonly hidden>
                            </div>

                            <div class="form-group row center">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-3">
                                    <a href="<?php echo e(route('admin.penjualan.index')); ?>" class="btn btn-primary px-3">
                                        <i class="fa fa-arrow-left"></i>
                                        Kembali
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                    <button type="reset" class="btn btn-danger px-4">
                                        <i class="fa fa-arrow-repeat"></i>
                                        Reset
                                    </button>
                                </div>
                                <div class="col-sm-3">
                                    <button type="button" class="btn btn-success px-3" id="btnSimpan">
                                        <i class="fa fa-floppy"></i>
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
                                const barangRows = document.querySelectorAll('.barang-row');

                                searchInput.addEventListener('input', function() {
                                    const searchValue = searchInput.value.toLowerCase();
                                    barangRows.forEach(function(row) {
                                        const namaBarang = row.querySelector('td:first-child').innerText.toLowerCase();
                                        if (namaBarang.includes(searchValue)) {
                                            row.style.display = '';
                                        } else {
                                            row.style.display = 'none';
                                        }
                                    });
                                });

                                // Hitung total
                                const jumlahBarangInputs = document.querySelectorAll('.jumlah-barang');
                                const totalHargaInputs = document.querySelectorAll('.total-harga');
                                const totalBayarInput = document.getElementById('total_bayar');
                                const dibayarInput = document.getElementById('dibayar');
                                const kembaliInput = document.getElementById('kembali');
                                const totalKeuntunganInput = document.getElementById('total_keuntungan');


                                function calculateTotal() {
                                    let totalBayar = 0;
                                    let totalKeuntungan = 0;
                                    jumlahBarangInputs.forEach((input, index) => {
                                        const jumlah = parseInt(input.value);
                                        const harga = parseFloat(input.getAttribute('data-harga'));
                                        const keuntungan = parseFloat(input.getAttribute('data-keuntungan'));
                                        const totalHarga = jumlah * harga;
                                        const total_keuntungan = jumlah * keuntungan;
                                        totalHargaInputs[index].value = totalHarga.toFixed(0);
                                        totalBayar += totalHarga;
                                        totalKeuntungan += total_keuntungan;
                                    });
                                    totalBayarInput.value = totalBayar.toFixed(0);
                                    totalKeuntunganInput.value = totalKeuntungan.toFixed(0);
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

                                const form = document.getElementById('formPenjualan');
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
                                            // Redirect ke halaman detail penjualan setelah berhasil disimpan
                                            if (data.id_penjualan) {
                                                const urlDetailPenjualan = `<?php echo e(route('penjualan.detail', ':id_penjualan')); ?>`.replace(':id_penjualan', data.id_penjualan);
                                                window.location.href = urlDetailPenjualan;
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Berkah Ibu App\abc\BekahIbuApp\resources\views/admin/penjualan/create.blade.php ENDPATH**/ ?>