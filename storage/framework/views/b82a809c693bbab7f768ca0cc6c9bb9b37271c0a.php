
<?php $__env->startSection('content'); ?>
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="#">Home</a> <span class="mx-2 mb-0">/</span> <strong
                        class="text-black">Product</strong></div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center font-weight-bold text-primary mb-4">
                    <h3 class="display-5 font-weight-bold" style="text-transform:uppercase">Produk Toko</h3>
                    <hr>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-md order-2  mb-5 mb-md-0">
                    <div class="border p-4 rounded mb-4">
                        <h2 class="mb-3 h6 text-uppercase  text-primary d-block font-weight-bold">Kategori Produk</h3>
                            <ul class="list-unstyled mb-0">
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categori): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="mb-1"><a href="<?php echo e(route('user.kategori', ['id' => $categori->id])); ?>"
                                            class="d-flex text-dark"><small><?php echo e($categori->name); ?></small> <small
                                                class="text-primary ml-auto">(
                                                <?php echo e($categori->jumlah); ?> )</small></a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                    </div>
                </div>
                <div class="col-md-10 order-1 ">
                    <div class="row mb-5 justify-content-center">
                        <?php $__currentLoopData = $produks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                                <div class="block-4 text-center border bg-secondary">
                                    <img src="<?php echo e(Storage::url($produk->image)); ?>" alt="Image placeholder" class="img-fluid"
                                        width="100%" style="height:200px">
                                    </a>
                                    <div class="block-4-text p-4" style="height: 200px;">
                                        <h3 class="text-white"><?php echo e(Str::limit($produk->name, 20, '...')); ?></h3>
                                        <p class="mb-0 text-white">Rp. <?php echo e(number_format($produk->price, 2, ',', '.')); ?></p>
                                        <?php if($produk->stok == 0): ?>
                                            <a href="<?php echo e(route('user.produk.detail', ['id' => $produk->id])); ?>"
                                                class="btn btn-primary mt-2 disabled" tabindex="-1" role="button"
                                                aria-disabled="true">Habis</a>
                                        <?php else: ?>
                                            <a href="<?php echo e(route('user.produk.detail', ['id' => $produk->id])); ?>"
                                                class="btn btn-dark mt-2">Detail</a>
                                        <?php endif; ?>

                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="row" data-aos="fade-up">
                        <div class="col-md-12 text-right">
                            <div class="d-flex justify-content-center">
                                <?php echo e($produks->links()); ?>

                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Petshop\resources\views/user/produk.blade.php ENDPATH**/ ?>