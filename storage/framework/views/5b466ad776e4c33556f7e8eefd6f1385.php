<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-dark bg-dark fixed-top">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block <?php if(request()->routeIs('admin.dashboard.*')): ?> active <?php endif; ?>">
            <a href="<?php echo e(route('admin.dashboard')); ?>" class="nav-link ">Home</a>
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
    <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->

        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fas fa-users mr-2"></i><?php echo e(Auth::user()->name); ?>

                <!-- <span class="badge badge-warning navbar-badge">15</span> -->
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <div class="dropdown-divider"></div>
                <a href="<?php echo e(route('profile.edit')); ?>" class="dropdown-item">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear mr-2" viewBox="0 0 16 16">
                        <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492M5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0" />
                        <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115z" />
                    </svg> Setting
                </a>
                <div class="dropdown-divider"></div>
                <a href="<?php echo e(route('logout')); ?>" class="dropdown-item" onclick="event.preventDefault(); if(confirm('Apakah Anda yakin ingin logout?')) { document.getElementById('logout-form').submit(); }">
                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                </a>
                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                    <?php echo csrf_field(); ?>
                </form>
            </div>
        </li>
    </ul>
</nav>
<!-- /.navbar --><?php /**PATH E:\Berkah Ibu App\abc\laravel-11-multi-auth-main\resources\views/admin/layouts/header.blade.php ENDPATH**/ ?>