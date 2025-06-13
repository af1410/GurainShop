

<?php $__env->startSection('title', 'Edit Barang'); ?>

<?php $__env->startSection('content'); ?>
<div class="content-wrapper ml-5 pr-5 pt-5">
    <div class="container-fluid pt-2 ">
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center"><b>Edit Data</b></h3>
                        <?php if($errors->any()): ?>
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                        <?php endif; ?>
                        <form action="<?php echo e(route('admin.barang.update', $barang->id_barang)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <div class="form-group">
                                <label for="namabarang">Nama Barang</label>
                                <input type="text" class="form-control" id="namabarang" name="namabarang" value="<?php echo e($barang->namabarang); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="hargabarang">Harga Barang</label>
                                <input type="number" class="form-control" id="hargabarang" name="hargabarang" value="<?php echo e($barang->hargabarang); ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="hargajual">Harga Jual</label>
                                <input type="number" class="form-control" id="hargajual" name="hargajual" value="<?php echo e($barang->hargajual); ?>" readonly>
                            </div>

                            <div class="form-group">
                                <label for="keuntungan">Keuntungan</label>
                                <input type="number" class="form-control" id="keuntungan" name="keuntungan" value="<?php echo e($barang->keuntungan); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="jumlahbarang">Jumlah Barang</label>
                                <input type="number" class="form-control" id="jumlahbarang" name="jumlahbarang" value="<?php echo e($barang->jumlahbarang); ?>" required readonly>
                            </div>
                            <div class="mb-3">
                                <label for="satuanbarang" class="form-label">Satuan Barang</label>
                                <select name="satuanbarang" class="form-control" id="satuanbarang" required>
                                    <option value="PCS" <?php echo e(old('satuanbarang') == 'PCS' ? 'selected' : ''); ?>>PCS</option>
                                    <option value="PACK" <?php echo e(old('satuanbarang') == 'PACK' ? 'selected' : ''); ?>>PACK</option>
                                    <option value="RIM" <?php echo e(old('satuanbarang') == 'RIM' ? 'selected' : ''); ?>>RIM</option>
                                    <option value="DUS" <?php echo e(old('satuanbarang') == 'DUS' ? 'selected' : ''); ?>>DUS</option>
                                </select>
                            </div>


                            <div class="form-group row center">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-3">
                                    <a href="<?php echo e(route('admin.barang.index')); ?>" class="btn btn-primary px-3">
                                        <i class="fa fa-arrow-left"></i>
                                        Kembali
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                    <button type="reset" class="btn btn-danger px-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                                            <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41m-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9" />
                                            <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5 5 0 0 0 8 3M3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9z" />
                                        </svg>
                                        Reset
                                    </button>
                                </div>
                                <div class="col-sm-3">
                                    <button type="submit" class="btn btn-success px-3">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-floppy2-fill" viewBox="0 0 16 16">
                                            <path d="M12 2h-2v3h2z" />
                                            <path d="M1.5 0A1.5 1.5 0 0 0 0 1.5v13A1.5 1.5 0 0 0 1.5 16h13a1.5 1.5 0 0 0 1.5-1.5V2.914a1.5 1.5 0 0 0-.44-1.06L14.147.439A1.5 1.5 0 0 0 13.086 0zM4 6a1 1 0 0 1-1-1V1h10v4a1 1 0 0 1-1 1zM3 9h10a1 1 0 0 1 1 1v5H2v-5a1 1 0 0 1 1-1" />
                                        </svg>
                                        Simpan
                                    </button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('hargabarang').addEventListener('input', hitungKeuntungan);
    document.getElementById('hargajual').addEventListener('input', hitungKeuntungan);

    function hitungKeuntungan() {
        var hargaBarang = parseFloat(document.getElementById('hargabarang').value) || 0;

        // Keuntungan 10% dari harga barang
        var keuntungan = hargaBarang * 0.10;

        // Harga jual adalah harga barang ditambah keuntungan
        var hargaJual = hargaBarang + keuntungan;

        // Menampilkan keuntungan dan harga jual di form
        document.getElementById('keuntungan').value = keuntungan.toFixed(0);
        document.getElementById('hargajual').value = hargaJual.toFixed(0);
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\gurainshop\resources\views/admin/barang/edit.blade.php ENDPATH**/ ?>