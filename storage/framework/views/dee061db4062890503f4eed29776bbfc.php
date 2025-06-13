

<?php $__env->startSection('title', 'Nota Penjualan'); ?>

<?php $__env->startSection('content'); ?>
<div class="content-wrapper ml-5 pr-5 pt-5">
    <div class="container-fluid pt-2">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card" id="notaPenjualan">
                    <div class="card-body">
                        <style>
        body {
            font-family: Arial, sans-serif;
        }

        .kop {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
        }

        .kop img {
            width: 100px;
            height: auto;
            margin-right: 20px;
        }

        .kop .text {
            text-align: left;
        }

        .kop h1 {
            font-size: 28px;
            margin: 0;
            font-weight: bold;
        }

        .kop h2 {
            font-size: 16px;
            margin: 2px 0;
        }

        .kop h3 {
            font-size: 14px;
            margin: 2px 0;
        }

        .line {
            border-top: 2px solid black;
            margin-top: 5px;
        }

        .line-thin {
            border-top: 1px solid black;
            margin-top: 2px;
            margin-bottom: 20px;
        }

        h2.judul {
            text-align: center;
            font-weight: bold;
            margin-top: 20px;
        }

        table th, table td {
            text-align: center;
            font-size: 14px;
        }
    </style>

    <div class="kop">
        <img src="<?php echo e(asset('img/GurainShop.png')); ?>" alt="Logo Gurain Shop">
        <div class="text">
            <h1>Toko Gurain Shop</h1>
            <h2>Kp. Gunung Leutik, RT. 01 RW. 10 Nagreg</h2>
            <h3>Telepon: 0881-0226-70083 | Email: gurainshop@gmail.com</h3>
        </div>
    </div>

                        <div class="line"></div>
                        <div class="line-thin"></div>
                        <hr>
                        <table class="table table-borderless">
                            <tr>
                                <td><b>ID Penjualan</b></td>
                                <td>: <?php echo e($penjualan->id_penjualan); ?></td>
                            </tr>
                            <tr>
                                <td><b>Tanggal</b></td>
                                <td>: <?php echo e($penjualan->tanggal); ?></td>
                            </tr>
                            <tr>
                                <td><b>Pelanggan</b></td>
                                <td>: <?php echo e($penjualan->pelanggan->namapelanggan); ?></td>
                            </tr>
                        </table>

                        <h3>Daftar Barang</h3>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama Barang</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $penjualan->detailPenjualan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($detail->barang->namabarang); ?></td>
                                    <td><?php echo e($detail->jumlah); ?></td>
                                    <td><?php echo e(number_format($detail->harga, 0, ',', '.')); ?></td>
                                    <td><?php echo e(number_format($detail->jumlah * $detail->harga, 0, ',', '.')); ?></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>

                        <div class="text-right">
                            <p><b>Total Bayar: </b>Rp <?php echo e(number_format($penjualan->total_bayar, 0, ',', '.')); ?></p>
                            <p><b>Dibayar: </b>Rp <?php echo e(number_format($penjualan->dibayar, 0, ',', '.')); ?></p>
                            <p><b>Kembali: </b>Rp <?php echo e(number_format($penjualan->kembali, 0, ',', '.')); ?></p>
                        </div>

                        <hr>

                        <div class="text-center">
                            <p>Terima Kasih Telah Berbelanja di Toko Kami!</p>
                            <p>Semoga Hari Anda Menyenangkan!</p>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-3 pb-5">
                    <a href="<?php echo e(route('admin.penjualan.index')); ?>" class="btn btn-primary mr-3"> <i class="fa fa-arrow-left pr-1"></i>Kembali</a>
                    <button onclick="printNota()" class="btn btn-success ml-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
                            <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1" />
                            <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1" />
                        </svg> Cetak Nota
                    </button>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function printNota() {
        var notaContent = document.getElementById('notaPenjualan').innerHTML;
        var originalContent = document.body.innerHTML;

        document.body.innerHTML = notaContent;
        window.print();
        document.body.innerHTML = originalContent;
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\gurainshop\resources\views/admin/penjualan/detail.blade.php ENDPATH**/ ?>