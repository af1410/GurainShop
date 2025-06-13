

<?php $__env->startSection('title', 'Data Barang'); ?>

<?php $__env->startSection('content'); ?>
<div class="content-wrapper ml-5 pr-5 mt-5">
    <div class="container-fluid pt-2 ">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow rounded mt-2">
                    <h2 class="text-center pt-4 mb-1 text-primary"><b>Data Barang</b></h2>
                    <div class="card-body">

                        <?php if(session('success')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?php echo e(session('success')); ?>

                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span>&times;</span>
                            </button>
                        </div>
                        <?php endif; ?>

                        <table class="table table-borderless mb-3">
                            <tr>
                                <td>
                                    <a href="<?php echo e(route('admin.barang.create')); ?>" class="btn btn-primary shadow-sm">
                                        <i class="fas fa-plus"></i> Tambah
                                    </a>
                                </td>
                                <td class="text-right mr-2">
                                    <a href="<?php echo e(route('admin.barang.print')); ?>" class="btn btn-success shadow-sm">
                                        <i class="bi bi-printer-fill"></i> Print
                                    </a>
                                </td>
                            </tr>
                        </table>

                        <table class="table table-bordered table-hover shadow-sm">
                            <thead class="thead-dark text-center">
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
                            <tbody class="text-center align-middle">
                                <?php $__currentLoopData = $barangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $barang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($barang->id_barang); ?></td>
                                    <td class="text-left"><?php echo e($barang->namabarang); ?></td>
                                    <td><span class="badge badge-info">Rp <?php echo e(number_format($barang->hargabarang, 0, ',', '.')); ?></span></td>
                                    <td><span class="badge badge-success">Rp <?php echo e(number_format($barang->hargajual, 0, ',', '.')); ?></span></td>
                                    <td><span class="badge badge-warning">Rp <?php echo e(number_format($barang->keuntungan, 0, ',', '.')); ?></span></td>
                                    <td><span class="badge badge-secondary"><?php echo e($barang->jumlahbarang); ?></span></td>
                                    <td><?php echo e($barang->satuanbarang); ?></td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <a href="<?php echo e(route('admin.barang.edit', $barang->id_barang)); ?>" class="btn btn-info btn-sm mr-1 shadow-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="<?php echo e(route('admin.barang.destroy', $barang->id_barang)); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" onclick="return confirm('Ingin Menghapus <?php echo e($barang->namabarang); ?> ?')" class="btn btn-danger btn-sm shadow-sm">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>

                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\gurainshop\resources\views/admin/barang/index.blade.php ENDPATH**/ ?>