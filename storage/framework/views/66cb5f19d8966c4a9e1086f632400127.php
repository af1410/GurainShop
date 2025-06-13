

<?php $__env->startSection('title', 'Daftar Pembelian'); ?>

<?php $__env->startSection('content'); ?>
<div class="content-wrapper ml-5 pr-5 pt-5">
    <div class="container-fluid pt-2">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-center mb-5">Daftar Pembelian</h1>
                        <a href="<?php echo e(route('pembelian.create')); ?>" class="btn btn-success mb-3"><i class="fas fa-plus pr-2"></i>Tambah Pembelian</a>

                        <table class="table table-bordered">
                            <thead class="bg-dark">
                                <tr>
                                    <th>ID Pembelian</th>
                                    <th>Tanggal</th>
                                    <th>Suplier</th>
                                    <th>Total Bayar</th>
                                    <th>Dibayar</th>
                                    <th>Kembali</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $pembelians; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pembelian): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($pembelian->id_pembelian); ?></td>
                                    <td><?php echo e($pembelian->tanggal); ?></td>
                                    <td><?php echo e($pembelian->suplier->namasuplier); ?></td>
                                    <td><?php echo e($pembelian->total_bayar); ?></td>
                                    <td><?php echo e($pembelian->dibayar); ?></td>
                                    <td><?php echo e($pembelian->kembali); ?></td>
                                    <td>
                                        <a href=" <?php echo e(route('pembelian.detail', $pembelian->id_pembelian)); ?> " class="btn btn-primary btn-sm"><i class="fas fa-info-circle pr-1"></i>Detail Penjualan</a>
                                    </td>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Berkah Ibu App\abc\laravel-11-multi-auth-main\resources\views/pembelian/index.blade.php ENDPATH**/ ?>