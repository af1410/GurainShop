

<?php $__env->startSection('title', 'Data User'); ?>

<?php $__env->startSection('content'); ?>
<div class="content-wrapper ml-5 pr-5 pt-5">

    <div class="container-fluid pt-2 ">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h2 class="text-center pt-4 mb-1"><b>Data User</b></h2>
                    <div class="card-body">
                        <table class="table table-borderless">
                            <tr>
                                <td>
                                    <a href="<?php echo e(route('admin.user.create')); ?>" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Tambah</a>
                                </td>
                                <td class="text-right mr-2">
                                    <a href="<?php echo e(route('admin.user.print')); ?>" class="btn btn-success mb-3 text-right">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
                                            <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1" />
                                            <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1" />
                                        </svg> Print
                                    </a>
                                </td>
                            </tr>

                        </table>
                        <?php if($message = session('success')): ?>
                        <div class="alert alert-success">
                            <p><?php echo e($message); ?></p>
                        </div>
                        <?php endif; ?>
                        <table class="table mt-2">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>E-Mail</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>

                                    <th><?php echo e($no++); ?></th>
                                    <th><?php echo e($user->name); ?></th>
                                    <th><?php echo e($user->email); ?></th>
                                    <th>
                                        <div class="d-flex">
                                            <a href="<?php echo e(route('admin.user.edit', $user->id)); ?>" class=" btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                                            <!-- <a href="/admin/user/<?php echo e($user->id_admin); ?>/destroy" onclick="return confirm('Hapus Data Dengan Username : <?php echo e($user->username); ?> ? ');" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a> -->
                                            <form action="<?php echo e(route('admin.user.destroy', $user->id)); ?>" method="post">
                                                <?php echo method_field('delete'); ?>
                                                <?php echo csrf_field(); ?>
                                                <button type="submit" class="btn btn-danger btn-sm ml-1" onclick="return confirm('Ingin Menhapus <?php echo e($user->name); ?> ?')"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </th>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Berkah Ibu App\abc\laravel-11-multi-auth-main\resources\views/admin/user/index.blade.php ENDPATH**/ ?>