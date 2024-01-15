
<?php $__env->startSection('content'); ?>
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0">
                    <a href="#">Home</a>
                    <span class="mx-2 mb-0">/</span>
                    <a href="#">Order</a>
                    <span class="mx-2 mb-0">/</span>
                    <strong class="text-black">Success</strong>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <span class="icon-check_circle display-3 text-success"></span>
                    <h2 class="display-3 text-primary font-weight-bold">Terima Kasih!</h2>
                    <p class="lead mb-5">Pesanan Kamu Berhasil Dibuat. Silahkan Konfirmasi Pembayaran Lewat
                        Menu Konfirmasi Pembayaran.</p>
                    <p><a href="<?php echo e(route('user.order')); ?>" class="btn btn-sm btn-dark">Menu Pembayaran</a></p>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Petshop\resources\views/user/terimakasih.blade.php ENDPATH**/ ?>