

<?php $__env->startSection('title', 'Data Barang'); ?>

<?php $__env->startSection('content'); ?>
<div class="content-wrapper ml-5 pr-5 pt-5">

    <div class="container-fluid pt-2 ">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h2 class="text-center pt-4 mb-1"><b>Data Barang</b></h2>
                    <div class="card-body">

                        <?php if(session('success')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('success')); ?>

                        </div>
                        <?php endif; ?>

                        <table class="table table-borderless">
                            <tr>
                                <td>
                                    <a href="<?php echo e(route('admin.barang.create')); ?>" class="btn btn-primary "><i class="fas fa-plus"></i> Tambah</a>
                                </td>
                                <td class="text-right mr-2">
                                    <a href="<?php echo e(route('admin.barang.print')); ?>" class="btn btn-success  text-right">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
                                            <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1" />
                                            <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1" />
                                        </svg> Print
                                    </a>
                                </td>
                            </tr>

                        </table>

                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>ID Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Harga Barang</th>
                                    <th>Harga Jual</th>
                                    <th>Keuntungan</th>
                                    <th>Jumlah Barang</th>
                                    <th>Satuan Barang</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $barangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $barang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($barang->id_barang); ?></td>
                                    <td><?php echo e($barang->namabarang); ?></td>
                                    <td><?php echo e($barang->hargabarang); ?></td>
                                    <td><?php echo e($barang->hargajual); ?></td>
                                    <td><?php echo e($barang->keuntungan); ?></td>
                                    <td><?php echo e($barang->jumlahbarang); ?></td>
                                    <td><?php echo e($barang->satuanbarang); ?></td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="<?php echo e(route('admin.barang.edit', $barang->id_barang)); ?>" class=" btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                                            <form action="<?php echo e(route('admin.barang.destroy', $barang->id_barang)); ?>" method="POST" style="display:inline;">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" onclick="return confirm('Ingin Menhapus <?php echo e($barang->namabarang); ?> ?')" class=" btn btn-danger btn-sm ml-1"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Berkah Ibu App\laravel-11-multi-auth-main\laravel-11-multi-auth-main\resources\views/admin/barang/index.blade.php ENDPATH**/ ?>