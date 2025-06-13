

<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<style>
    body {
        font-family: 'Poppins', sans-serif;
    }

    .dashboard-card {
        border-radius: 20px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        color: white;
        transition: all 0.3s ease-in-out;
        animation: fadeIn 0.6s ease;
    }

    .dashboard-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 35px rgba(0, 0, 0, 0.15);
    }

    .dashboard-icon {
        font-size: 2.5rem;
        opacity: 0.8;
    }

    .bg-gradient-blue {
        background: linear-gradient(135deg, #00c6ff 0%, #0072ff 100%);
    }

    .bg-gradient-green {
        background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
    }

    .bg-gradient-purple {
        background: linear-gradient(135deg, #9d50bb 0%, #6e48aa 100%);
    }

    .bg-gradient-orange {
        background: linear-gradient(135deg, #f7971e 0%, #ffd200 100%);
    }

    .bg-gradient-red {
        background: linear-gradient(135deg, #f953c6 0%, #b91d73 100%);
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<div class="content-wrapper ml-5 pr-5 pt-5">
    <div class="container-fluid pt-2">
        <h2 class="text-center mb-4"><strong>Dashboard</strong></h2>
        <div class="row g-3">

            <div class="col-md-4 mb-4">
                <a href="<?php echo e(route('admin.pelanggan.index')); ?>">
                    <div class="card dashboard-card bg-gradient-blue">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title mb-0">Total Pelanggan</h5>
                                <p class="mb-0"><?php echo e($totalPelanggan); ?></p>
                            </div>
                            <i class="fas fa-users dashboard-icon"></i>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-4 mb-4">
                <a href="<?php echo e(route('admin.barang.index')); ?>">
                    <div class="card dashboard-card bg-gradient-green">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title mb-0">Total Barang</h5>
                                <p class="mb-0"><?php echo e($totalBarang); ?></p>
                            </div>
                            <i class="fas fa-boxes dashboard-icon"></i>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card dashboard-card bg-gradient-purple">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title mb-0">Total Suplier</h5>
                            <p class="mb-0"><?php echo e($totalSuplier); ?></p>
                        </div>
                        <i class="fas fa-truck dashboard-icon"></i>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <a href="<?php echo e(route('admin.user.index')); ?>">
                    <div class="card dashboard-card bg-gradient-orange">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title mb-0">Total Kasir</h5>
                                <p class="mb-0"><?php echo e($totalUser); ?></p>
                            </div>
                            <i class="fas fa-user-tie dashboard-icon"></i>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-4 mb-4">
                <a href="<?php echo e(route('admin.admin.index')); ?>">
                    <div class="card dashboard-card bg-gradient-red">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title mb-0">Total Admin</h5>
                                <p class="mb-0"><?php echo e($totalAdmin); ?></p>
                            </div>
                            <i class="fas fa-user-shield dashboard-icon"></i>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\gurainshop\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>