
<?php $__env->startSection('content'); ?>
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="#">Home</a> <span class="mx-2 mb-0">/</span><a
                        href="#">Product</a> <span class="mx-2 mb-0">/</span> <strong
                        class="text-black"><?php echo e($category->name); ?></strong></div>
            </div>
        </div>
    </div>

    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="container alert alert-danger alert-dismissible fade show text-center justify-content-center"
            role="alert">
            <?php echo e($error); ?>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center text-primary mb-4">
                    <h3 class="display-5 font-weight-bold" style="text-transform:uppercase">Detail Produk</h3>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <img src="<?php echo e(Storage::url($produk->image)); ?>" alt="Image" width="100%" class="img-fluid">
                </div>
                <div class="col-md-6">
                    <h2 class="font-weight-bold text-primary"><?php echo e($produk->name); ?></h2>
                    <p class="text-dark">
                        <?php echo e($produk->description); ?>

                    </p>
                    <p>
                        <strong class="text-primary h4">Rp <?php echo e(number_format($produk->price, 2, ',', '.')); ?> </strong>
                    </p>
                    <div class="mb-5">
                        <form action="<?php echo e(route('user.keranjang.simpan')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <?php if(Route::has('login')): ?>
                                <?php if(auth()->guard()->check()): ?>
                                    <input type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>">
                                <?php endif; ?>
                            <?php endif; ?>
                            <input type="hidden" name="products_id" value="<?php echo e($produk->id); ?>">
                            <small>Sisa Stok <?php echo e($produk->stok); ?></small>
                            <input type="hidden" value="<?php echo e($produk->stok); ?>" id="sisastok">
                            <div class="input-group mb-3" style="max-width: 120px;">
                                <div class="input-group-prepend">
                                    <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                                </div>
                                <input type="text" name="qty" class="form-control text-center" value="1"
                                    placeholder="" aria-label="Example text with button addon"
                                    aria-describedby="button-addon1">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                                </div>
                            </div>

                    </div>
                    <p><button type="submit" class="buy-now btn btn-sm btn-dark">Masukkan ke keranjang</button></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Petshop\resources\views/user/produkdetail.blade.php ENDPATH**/ ?>