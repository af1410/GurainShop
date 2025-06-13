<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<div class="content-wrapper ml-5 pr-5 pt-5">
    <div class="container-fluid pt-2">
        <h1 class="text-center">Dashboard</h1>
        <div class="row">
            <div class="col-md-6">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-header">Total Penjualan</div>
                    <div class="card-body">
                        <h5 class="card-title">Rp <?php echo e(number_format($totalPenjualan, 0, ',', '.')); ?></h5>
                        <p class="card-text">Jumlah total penjualan yang telah dilakukan.</p>
                        <a class="text-white" href="<?php echo e(route('owner.laporanjual.index')); ?>">Lihat Details >>></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-header">Total Pembelian</div>
                    <div class="card-body">
                        <h5 class="card-title">Rp <?php echo e(number_format($totalPembelian, 0, ',', '.')); ?></h5>
                        <p class="card-text">Jumlah total pembelian yang telah dilakukan.</p>
                        <a class="text-white" href="<?php echo e(route('owner.laporanbeli.index')); ?>">Lihat Details >>></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('owner.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Berkah Ibu App\abc\BekahIbuApp\resources\views/owner/dashboard.blade.php ENDPATH**/ ?>