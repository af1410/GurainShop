<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e(config('app.name')); ?> | Login</title>
    <link rel="icon" href="<?php echo e(asset('img/favicon.png')); ?>" type="image/png">
    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('vendor/adminlte/dist/css/adminlte.min.css')); ?>">
</head>

<body class="hold-transition login-page">
    <div class="login-box">

        <!-- /.login-logo -->
        <div class="card">
            <div class="card-head">
                <div class="login-logo">
                    <img src="<?php echo e(asset('img/favicon.png')); ?>" alt="" class="mt-3" style="width: 200px; height: 150px;">
                    <h4 class="text-dark text-center" style="font-size: 32px; line-height: 36px;">
                        Selamat Datang <br> di <br>Berkah Ibu App
                    </h4>
                </div>
            </div>
            <div class="card-body login-card-body">

                <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                <?php endif; ?>
                <h4 class="text-dark text-center" style="font-size: 28px;">Login Sebagai :</h4>
                <div class="d-flex flex-column px-2">
                    <?php if(auth()->guard('web')->check()): ?>
                    <a href="<?php echo e(url('/dashboard')); ?>" class="btn btn-primary text-light mb-2">
                        Kasir
                    </a>
                    <?php else: ?>
                    <a href="<?php echo e(route('login')); ?>" class="btn btn-primary text-light mb-2">
                        Kasir
                    </a>
                    <?php endif; ?>

                    <?php if(auth()->guard('admin')->check()): ?>
                    <a href="<?php echo e(url('/admin/dashboard')); ?>" class="btn btn-primary text-light mb-2">
                        Admin
                    </a>
                    <?php else: ?>
                    <a href="<?php echo e(route('admin.login')); ?>" class="btn btn-primary text-light mb-2">
                        Admin
                    </a>
                    <?php endif; ?>

                    <?php if(auth()->guard('owner')->check()): ?>
                    <a href="<?php echo e(url('/owner/dashboard')); ?>" class="btn btn-primary text-light mb-2">
                        Owner
                    </a>
                    <?php else: ?>
                    <a href="<?php echo e(route('owner.login')); ?>" class="btn btn-primary text-light mb-2">
                        Owner
                    </a>
                    <?php endif; ?>
                </div>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- AdminLTE JS -->
    <script src="<?php echo e(asset('vendor/adminlte/dist/js/adminlte.min.js')); ?>"></script>
</body>

</html><?php /**PATH E:\Berkah Ibu App\abc\BekahIbuApp\resources\views/welcome.blade.php ENDPATH**/ ?>