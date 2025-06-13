<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e(config('app.name', 'Gurain Shop')); ?> | Login</title>
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
            margin: 60px auto;
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

        .card-head b {
            font-size: 24px;
            color: #007bff;
        }

        .login-card-body {
            padding: 2rem;
            background-color: #fefefe;
        }

        .form-control {
            border-radius: 10px;
        }

        .input-group-text {
            border-radius: 0 10px 10px 0;
        }

        .btn-primary {
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            box-shadow: 0 6px 15px rgba(0, 123, 255, 0.3);
            transform: translateY(-1px);
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
            <div class="card-head mt-4">
                <div class="login-logo">
                    <b>Gurain Shop App</b><br>
                    <img src="<?php echo e(asset('img/GurainShop.png')); ?>" alt="Gurain Logo" class="mt-3 mb-3">
                </div>
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

                <form action="<?php echo e(route('owner.login')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="input-group mb-3">
                        <input type="text" name="email" class="form-control" placeholder="Username" value="<?php echo e(old('username')); ?>" required autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user text-primary"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock text-primary"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script src="<?php echo e(asset('vendor/adminlte/dist/js/adminlte.min.js')); ?>"></script>
</body>

</html>
<?php /**PATH D:\gurainshop\resources\views/owner/auth/login.blade.php ENDPATH**/ ?>