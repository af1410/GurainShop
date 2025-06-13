<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<div class="content-wrapper ml-5 pr-5 pt-5">
    <div class="container-fluid pt-2">
        <h1 class="text-center">Dashboard</h1>
        <div class="row">
            <div class="col-md-4">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-header">Total Penjualan</div>
                    <div class="card-body">
                        <h5 class="card-title">Rp <?php echo e(number_format($totalPenjualan, 0, ',', '.')); ?></h5>
                        <p class="card-text">Jumlah total penjualan yang telah dilakukan.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-header">Total Pelanggan</div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo e($totalPelanggan); ?></h5>
                        <p class="card-text">Jumlah pelanggan terdaftar di sistem.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-header">Total Barang</div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo e($totalBarang); ?></h5>
                        <p class="card-text">Jumlah barang yang tersedia dalam inventaris.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-header">Total Pembelian</div>
                    <div class="card-body">
                        <h5 class="card-title">Rp <?php echo e(number_format($totalPembelian, 0, ',', '.')); ?></h5>
                        <p class="card-text">Jumlah total pembelian yang telah dilakukan.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-header">Total Suplier</div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo e($totalSuplier); ?></h5>
                        <p class="card-text">Jumlah suplier terdaftar di sistem.</p>
                    </div>
                </div>
            </div>
        </div>

        <h3>Statistik Penjualan Terakhir</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID Penjualan</th>
                        <th>Tanggal</th>
                        <th>Total Bayar</th>
                        <th>Dibayar</th>
                        <th>Kembali</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $recentPenjualans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $penjualan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($penjualan->id_penjualan); ?></td>
                        <td><?php echo e($penjualan->tanggal); ?></td>
                        <td>Rp <?php echo e(number_format($penjualan->total_bayar, 0, ',', '.')); ?></td>
                        <td>Rp <?php echo e(number_format($penjualan->dibayar, 0, ',', '.')); ?></td>
                        <td>Rp <?php echo e(number_format($penjualan->kembali, 0, ',', '.')); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>

        <h3>Statistik Pembelian Terakhir</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID Pembelian</th>
                        <th>Tanggal</th>
                        <th>Total Bayar</th>
                        <th>Dibayar</th>
                        <th>Kembali</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $recentPembelians; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pembelian): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($pembelian->id_pembelian); ?></td>
                        <td><?php echo e($pembelian->tanggal); ?></td>
                        <td>Rp <?php echo e(number_format($pembelian->total_bayar, 0, ',', '.')); ?></td>
                        <td>Rp <?php echo e(number_format($pembelian->dibayar, 0, ',', '.')); ?></td>
                        <td>Rp <?php echo e(number_format($pembelian->kembali, 0, ',', '.')); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Berkah Ibu App\laravel-11-multi-auth-main\laravel-11-multi-auth-main\resources\views/dashboard.blade.php ENDPATH**/ ?>