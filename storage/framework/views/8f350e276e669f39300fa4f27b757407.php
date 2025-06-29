<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e(config('app.name')); ?> | Login</title>
    <link rel="icon" href="<?php echo e(asset('img/GurainShop.png')); ?>" type="image/png">
    <link rel="stylesheet" href="<?php echo e(asset('vendor/adminlte/dist/css/adminlte.min.css')); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #e0f7fa, #ffffff);
            font-family: 'Poppins', sans-serif;
        }

        .login-box {
            max-width: 450px;
            margin: 50px auto;
        }

        .card {
            border-radius: 18px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            animation: fadeIn 1s ease;
        }

        .card-head {
            background-color: #ffffff;
            text-align: center;
            padding: 30px 20px 0;
        }

        .card-head img {
            width: 140px;
            height: auto;
            transition: transform 0.3s ease;
        }

        .card-head img:hover {
            transform: scale(1.05);
        }

        .card-head h4 {
            margin-top: 20px;
            font-weight: 600;
            color: #007bff;
            font-size: 26px;
            line-height: 1.4;
        }

        .login-card-body {
            padding: 2rem;
            background-color: #fafafa;
        }

        .login-card-body h4 {
            margin-bottom: 1.5rem;
            font-weight: 600;
            color: #333;
            text-align: center;
        }

        .btn-custom {
            background-color: #ffffff;
            color: #007bff;
            border: 2px solid #007bff;
            border-radius: 12px;
            font-weight: 600;
            padding: 10px;
            transition: all 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #007bff;
            color: #ffffff;
            transform: scale(1.03);
            box-shadow: 0 6px 15px rgba(0, 123, 255, 0.3);
        }

        .alert {
            border-radius: 10px;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(15px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card">
            <div class="card-head">
                <img src="<?php echo e(asset('img/GurainShop.png')); ?>" alt="Logo">
                <h4>Selamat Datang <br>di <strong>Gurain Shop App</strong></h4>
            </div>
            <div class="card-body login-card-body">
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <h4>Login Sebagai:</h4>
                <div class="d-flex flex-column gap-2 px-2">
                    <?php if(auth()->guard('web')->check()): ?>
                        <a href="<?php echo e(url('/dashboard')); ?>" class="btn btn-custom mb-3">Kasir</a>
                    <?php else: ?>
                        <a href="<?php echo e(route('login')); ?>" class="btn btn-custom mb-3">Kasir</a>
                    <?php endif; ?>

                    <?php if(auth()->guard('admin')->check()): ?>
                        <a href="<?php echo e(url('/admin/dashboard')); ?>" class="btn btn-custom mb-3">Admin</a>
                    <?php else: ?>
                        <a href="<?php echo e(route('admin.login')); ?>" class="btn btn-custom mb-3">Admin</a>
                    <?php endif; ?>

                    <?php if(auth()->guard('owner')->check()): ?>
                        <a href="<?php echo e(url('/owner/dashboard')); ?>" class="btn btn-custom mb-3">Owner</a>
                    <?php else: ?>
                        <a href="<?php echo e(route('owner.login')); ?>" class="btn btn-custom mb-3">Owner</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo e(asset('vendor/adminlte/dist/js/adminlte.min.js')); ?>"></script>
</body>

</html>
<?php /**PATH D:\gurainshop\resources\views/welcome.blade.php ENDPATH**/ ?>