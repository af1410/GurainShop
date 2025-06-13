

<?php $__env->startSection('title', 'Detail Pembelian'); ?>

<?php $__env->startSection('content'); ?>
<div class="content-wrapper ml-5 pr-5 pt-5">
    <div class="container-fluid pt-2">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card" id="notaPembelian">
                    <div class="card-body">
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
                                font-size: 12px;
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
                        </style>
                        <div class="kop">
                            <!-- Ganti dengan logo perusahaan -->
                            <h1 style=" margin-top: 20px;"><b>Toko Berkah Ibu</b></h1>
                            <h2>Jl. Letnan Adun Rt. 06 Rw. 05 Ds. Rancaekek Kulon Kec. Rancaekek</h2>
                            <h2>Telepon: 089602925233 | Email: berkahibu@gmail.com</h2>
                        </div>

                        <div class="line"></div>
                        <div class="line-thin"></div>
                        <hr>
                        <table class="table table-borderless">
                            <tr>
                                <td><b>ID Pembelian</b></td>
                                <td>: <?php echo e($pembelian->id_pembelian); ?></td>
                            </tr>
                            <tr>
                                <td><b>Tanggal</b></td>
                                <td>: <?php echo e($pembelian->tanggal); ?></td>
                            </tr>
                            <tr>
                                <td><b>Suplier</b></td>
                                <td>: <?php echo e($pembelian->suplier->namasuplier); ?></td>
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
                                <?php $__currentLoopData = $pembelian->detailPembelian; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                            <p><b>Total Bayar: </b>Rp <?php echo e(number_format($pembelian->total_bayar, 0, ',', '.')); ?></p>
                            <p><b>Dibayar: </b>Rp <?php echo e(number_format($pembelian->dibayar, 0, ',', '.')); ?></p>
                        </div>

                        <hr>

                        <div class="text-center">
                            <p>Terima Kasih Telah Berbelanja di Toko Kami!</p>
                            <p>Semoga Hari Anda Menyenangkan!</p>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-3 pb-5">
                    <a href="<?php echo e(route('pembelian.index')); ?>" class="btn btn-primary mr-3"> <i class="fa fa-arrow-left pr-1"></i>Kembali</a>
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
        var notaContent = document.getElementById('notaPembelian').innerHTML;
        var originalContent = document.body.innerHTML;

        document.body.innerHTML = notaContent;
        window.print();
        document.body.innerHTML = originalContent;
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Berkah Ibu App\abc\BekahIbuApp\resources\views/pembelian/detail.blade.php ENDPATH**/ ?>