<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<div class="content-wrapper ml-5 pr-5 pt-5">
    <div class="container-fluid pt-2">
        <h1 class="text-center">Dashboard</h1>
        <div class="row">
            <div class="col-md-4">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-header">Total Pelanggan</div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo e($totalPelanggan); ?></h5>
                        <p class="card-text">Jumlah pelanggan terdaftar di sistem.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-header">Total Barang</div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo e($totalBarang); ?></h5>
                        <p class="card-text">Jumlah barang yang tersedia dalam inventaris.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-header">Total Suplier</div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo e($totalSuplier); ?></h5>
                        <p class="card-text">Jumlah suplier terdaftar di sistem.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-header">Total Kasir</div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo e($totalUser); ?></h5>
                        <p class="card-text">Jumlah kasir terdaftar di sistem.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-header">Total Admin</div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo e($totalAdmin); ?></h5>
                        <p class="card-text">Jumlah admin terdaftar di sistem.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Berkah Ibu App\abc\BekahIbuApp\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>