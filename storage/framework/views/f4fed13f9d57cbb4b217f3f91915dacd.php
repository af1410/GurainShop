

<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<div class="content-wrapper ml-5 pr-5 pt-5 mt-5">
    <div class="container-fluid">
        <!-- Header -->
        <div class="text-center mb-4">
            <h1 class="display-5 font-weight-bold text-primary">Dashboard</h1>
            <p class="text-muted">Ringkasan aktivitas penjualan dan pembelian.</p>
        </div>

        <!-- Cards -->
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm border-left-primary">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-primary text-uppercase">Total Penjualan</h6>
                            <h4 class="font-weight-bold">Rp <?php echo e(number_format($totalPenjualan, 0, ',', '.')); ?></h4>
                            <p class="text-muted mb-0">Jumlah total penjualan yang telah dilakukan.</p>
                        </div>
                        <i class="fas fa-shopping-cart fa-2x text-primary"></i>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card shadow-sm border-left-success">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-success text-uppercase">Total Pembelian</h6>
                            <h4 class="font-weight-bold">Rp <?php echo e(number_format($totalPembelian, 0, ',', '.')); ?></h4>
                            <p class="text-muted mb-0">Jumlah total pembelian yang telah dilakukan.</p>
                        </div>
                        <i class="fas fa-cash-register fa-2x text-success"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel Penjualan -->
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">📈 Statistik Penjualan Terakhir</h5>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-hover table-striped">
                    <thead class="thead-light">
                        <tr>
                            <th>ID Penjualan</th>
                            <th>Tanggal</th>
                            <th>Total Bayar</th>
                            <th>Dibayar</th>
                            <th>Kembali</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $recentPenjualans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $penjualan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($penjualan->id_penjualan); ?></td>
                            <td><?php echo e($penjualan->tanggal); ?></td>
                            <td>Rp <?php echo e(number_format($penjualan->total_bayar, 0, ',', '.')); ?></td>
                            <td>Rp <?php echo e(number_format($penjualan->dibayar, 0, ',', '.')); ?></td>
                            <td>Rp <?php echo e(number_format($penjualan->kembali, 0, ',', '.')); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="5" class="text-center text-muted">Tidak ada data penjualan.</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Tabel Pembelian -->
        <div class="card shadow-sm">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0">📊 Statistik Pembelian Terakhir</h5>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-hover table-striped">
                    <thead class="thead-light">
                        <tr>
                            <th>ID Pembelian</th>
                            <th>Tanggal</th>
                            <th>Total Bayar</th>
                            <th>Dibayar</th>
                            <th>Kembali</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $recentPembelians; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pembelian): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($pembelian->id_pembelian); ?></td>
                            <td><?php echo e($pembelian->tanggal); ?></td>
                            <td>Rp <?php echo e(number_format($pembelian->total_bayar, 0, ',', '.')); ?></td>
                            <td>Rp <?php echo e(number_format($pembelian->dibayar, 0, ',', '.')); ?></td>
                            <td>Rp <?php echo e(number_format($pembelian->kembali, 0, ',', '.')); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="5" class="text-center text-muted">Tidak ada data pembelian.</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\gurainshop\resources\views/dashboard.blade.php ENDPATH**/ ?>