<!-- Navbar -->
<style>
    .main-header {
        background-color: #ffffff;
        border-bottom: 1px solid #e4e4e4;
        box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    }

    .nav-link {
        transition: all 0.2s ease-in-out;
        padding: 8px 15px;
        border-radius: 6px;
        color: #343a40 !important;
        font-weight: 500;
    }

    .nav-link:hover {
        background-color: #f0f0f0;
        color: #007bff !important;
    }

    .nav-item.active .nav-link {
        font-weight: bold;
        color: #007bff !important;
        background-color: #eaf1ff;
        border-radius: 6px;
    }

    .dropdown-menu {
        border-radius: 8px;
    }

    .dropdown-item:hover {
        background-color: #f8f9fa;
    }

    .text-danger:hover {
        background-color: #ffe5e5;
    }
</style>

<nav class="main-header navbar navbar-expand navbar-light fixed-top">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                <i class="fas fa-bars"></i>
            </a>
        </li>
        <li class="nav-item d-none d-sm-inline-block <?php if(request()->routeIs('admin.dashboard')): ?> active <?php endif; ?>">
            <a href="<?php echo e(route('admin.dashboard')); ?>" class="nav-link">Dashboard</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block <?php if(request()->routeIs('admin.barang.*')): ?> active <?php endif; ?>">
            <a href="<?php echo e(route('admin.barang.index')); ?>" class="nav-link">Barang</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block <?php if(request()->routeIs('admin.pelanggan.*')): ?> active <?php endif; ?>">
            <a href="<?php echo e(route('admin.pelanggan.index')); ?>" class="nav-link">Pelanggan</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block <?php if(request()->routeIs('admin.suplier.*')): ?> active <?php endif; ?>">
            <a href="<?php echo e(route('admin.suplier.index')); ?>" class="nav-link">Suplier</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block <?php if(request()->routeIs('admin.user.*')): ?> active <?php endif; ?>">
            <a href="<?php echo e(route('admin.user.index')); ?>" class="nav-link">Kasir</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block <?php if(request()->routeIs('admin.admin.*')): ?> active <?php endif; ?>">
            <a href="<?php echo e(route('admin.admin.index')); ?>" class="nav-link">Admin</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto align-items-center">
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button" title="Fullscreen">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fas fa-user-circle mr-2"></i> <?php echo e(Auth::user()->name); ?>

            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right shadow">
                <a href="<?php echo e(route('admin.profile.edit')); ?>" class="dropdown-item">
                    <i class="fas fa-cog mr-2"></i> Setting
                </a>
                <div class="dropdown-divider"></div>
                <a href="<?php echo e(route('admin.logout')); ?>" class="dropdown-item text-danger"
                   onclick="event.preventDefault(); if(confirm('Apakah Anda yakin ingin logout?')) { document.getElementById('logout-form').submit(); }">
                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                </a>
                <form id="logout-form" action="<?php echo e(route('admin.logout')); ?>" method="POST" style="display: none;">
                    <?php echo csrf_field(); ?>
                </form>
            </div>
        </li>
    </ul>
</nav>
<?php /**PATH D:\gurainshop\resources\views/admin/layouts/header.blade.php ENDPATH**/ ?>