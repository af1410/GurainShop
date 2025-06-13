

<?php $__env->startSection('title', 'Laporan Pembelian'); ?>

<?php $__env->startSection('content'); ?>
<div class="content-wrapper ml-5 pr-5 pt-5">
    <div class="container-fluid pt-2">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-center mb-5">Pilih Jenis Laporan Pembelian</h1>

                        <div class="row">
                            <!-- Laporan Harian -->
                            <div class="col-md-4">
                                <div class="border p-3 mb-4 d-flex flex-column h-100">
                                    <form action="<?php echo e(route('owner.laporanbeli.harian')); ?>" method="POST" class="flex-grow-1 d-flex flex-column">
                                        <?php echo csrf_field(); ?>
                                        <h4>Laporan Harian</h4>
                                        <div class="form-group">
                                            <label for="tanggal_harian">Pilih Tanggal:</label>
                                            <input type="date" class="form-control" name="tanggal" id="tanggal_harian" required>
                                        </div>
                                        <div class="mt-auto">
                                            <button type="submit" class="btn btn-primary btn-block">Cetak Laporan Harian</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- Laporan Mingguan -->
                            <div class="col-md-4">
                                <div class="border p-3 mb-4 d-flex flex-column h-100">
                                    <form action="<?php echo e(route('owner.laporanbeli.mingguan')); ?>" method="POST" class="flex-grow-1 d-flex flex-column">
                                        <?php echo csrf_field(); ?>
                                        <h4>Laporan Mingguan</h4>
                                        <div class="form-group">
                                            <label for="tanggal_awal">Tanggal Awal:</label>
                                            <input type="date" class="form-control" name="tanggal_awal" id="tanggal_awal" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggal_akhir">Tanggal Akhir:</label>
                                            <input type="date" class="form-control" name="tanggal_akhir" id="tanggal_akhir" required>
                                        </div>
                                        <div class="mt-auto">
                                            <button type="submit" class="btn btn-primary btn-block">Cetak Laporan Mingguan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- Laporan Bulanan -->
                            <div class="col-md-4">
                                <div class="border p-3 mb-4 d-flex flex-column h-100">
                                    <form action="<?php echo e(route('owner.laporanbeli.bulanan')); ?>" method="POST" class="flex-grow-1 d-flex flex-column">
                                        <?php echo csrf_field(); ?>
                                        <h4>Laporan Bulanan</h4>
                                        <div class="form-group">
                                            <label for="bulan">Pilih Bulan:</label>
                                            <select class="form-control" name="bulan" id="bulan" required>
                                                <?php for($i = 1; $i <= 12; $i++): ?>
                                                    <option value="<?php echo e($i); ?>"><?php echo e(date('F', mktime(0, 0, 0, $i, 1))); ?></option>
                                                    <?php endfor; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="tahun">Pilih Tahun:</label>
                                            <input type="number" class="form-control" name="tahun" id="tahun" min="2020" max="<?php echo e(date('Y')); ?>" required>
                                        </div>
                                        <div class="mt-auto">
                                            <button type="submit" class="btn btn-primary btn-block">Cetak Laporan Bulanan</button>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('owner.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Berkah Ibu App\abc\BekahIbuApp\resources\views/owner/laporanbeli/index.blade.php ENDPATH**/ ?>