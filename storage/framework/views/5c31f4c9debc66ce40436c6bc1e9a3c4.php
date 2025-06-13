

<?php $__env->startSection('title', 'Daftar Penjualan'); ?>

<?php $__env->startSection('content'); ?>
<div class="content-wrapper ml-5 pr-5 pt-5">
    <div class="container-fluid pt-2">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-center mb-5">Daftar Penjualan</h1>
                        <a href="<?php echo e(route('penjualan.create')); ?>" class="btn btn-success mb-3"><i class="fas fa-plus"></i> Tambah Penjualan</a>

                        <table class="table table-bordered">
                            <thead class="bg-dark">
                                <tr>
                                    <th>ID Penjualan</th>
                                    <th>Tanggal</th>
                                    <th>Pelanggan</th>
                                    <th>Total Bayar</th>
                                    <th>Dibayar</th>
                                    <th>Kembali</th>
                                    <th>Keuntungan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $penjualans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $penjualan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($penjualan->id_penjualan); ?></td>
                                    <td><?php echo e($penjualan->tanggal); ?></td>
                                    <td><?php echo e($penjualan->pelanggan->namapelanggan); ?></td>
                                    <td><?php echo e($penjualan->total_bayar); ?></td>
                                    <td><?php echo e($penjualan->dibayar); ?></td>
                                    <td><?php echo e($penjualan->kembali); ?></td>
                                    <td><?php echo e($penjualan->total_keuntungan); ?></td>

                                    <td><a href=" <?php echo e(route('penjualan.detail', $penjualan->id_penjualan)); ?> " class="btn btn-primary btn-sm"><i class="fas fa-info-circle pr-1"></i>Detail Penjualan</a></td>
                                    <!-- <ul>
                                            <?php $__currentLoopData = $penjualan->detailPenjualan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($detail->barang->namabarang); ?> - <?php echo e($detail->jumlah); ?> x <?php echo e($detail->harga); ?></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul> -->

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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Berkah Ibu App\abc\BekahIbuApp\resources\views/penjualan/index.blade.php ENDPATH**/ ?>