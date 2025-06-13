

<?php $__env->startSection('title', 'Laporan Penjualan Bulanan'); ?>

<?php $__env->startSection('content'); ?>
<div class="content-wrapper ml-5 pr-5 pt-5">
    <div class="container-fluid pt-2">
        <style>
            body {
                font-family: Arial, sans-serif;
            }

            .kop {
                text-align: center;
                margin-bottom: 20px;
            }

            .kop img {
                width: 100px;
                height: auto;
            }

            .kop h1,
            .kop h2,
            .kop h3 {
                margin: 0;
            }

            .kop h1 {
                font-size: 40px;
                margin-bottom: 5px;
            }

            .kop h2 {
                font-size: 20px;
                margin-bottom: 5px;
            }

            .kop h3 {
                font-size: 16px;
                margin-bottom: 5px;
            }

            .line {
                border-top: 2px solid black;
                margin-top: 10px;
            }

            .line-thin {
                border-top: 1px solid black;
                margin-top: 2px;
            }

            @media print {
                #printButton {
                    display: none;
                    /* Sembunyikan tombol print */
                }
            }
        </style>
        <div class="kop">
            <!-- Ganti dengan logo perusahaan -->
            <h1 style=" margin-top: 20px;"><b>Toko Berkah Ibu</b></h1>
            <h2>Jl. Letnan Adun Rt. 06 Rw. 05 Ds. Rancaekek Kulon Kec. Rancaekek</h2>
            <h3>Telepon: 089602925233 | Email: berkahibu@gmail.com</h3>
        </div>

        <div class="line"></div>
        <div class="line-thin"></div>
        <h2 class="text-center mt-3">Laporan Penjualan Mingguan</h2>
        <table class="mb-3">
            <tr>
                <td>Dari Tanggal</td>
                <td> : <?php echo e($tanggalAwal); ?></td>
            </tr>
            <tr>
                <td>Sampai Tanggal</td>
                <td> : <?php echo e($tanggalAkhir); ?></td>
            </tr>
        </table>
        <button id="printButton" onclick="window.print()" class="btn btn-success mb-3">Print Laporan</button>

        <?php if($penjualans->isEmpty()): ?>
        <p class="text-center">Tidak ada penjualan untuk bulan ini.</p>
        <?php else: ?>
        <table class="table">
            <thead>
                <tr>
                    <th>ID Penjualan</th>
                    <th>Barang</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th>Keuntungan</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $penjualans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $penjualan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $__currentLoopData = $penjualan->detailPenjualan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($penjualan->id_penjualan); ?></td>
                    <td><?php echo e($detail->barang->namabarang); ?></td>
                    <td><?php echo e($detail->jumlah); ?></td>
                    <td><?php echo e(number_format($penjualan->total_bayar)); ?></td>
                    <td><?php echo e(number_format($penjualan->total_keuntungan)); ?></td>
                    <td><?php echo e($penjualan->created_at); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('owner.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Berkah Ibu App\abc\BekahIbuApp\resources\views/owner/laporanjual/mingguan.blade.php ENDPATH**/ ?>