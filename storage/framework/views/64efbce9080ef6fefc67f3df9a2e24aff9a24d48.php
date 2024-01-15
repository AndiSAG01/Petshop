
<?php $__env->startSection('content'); ?>
    <div class="bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="#">Home</a> <span class="mx-2 mb-0">/</span> <strong
                        class="text-black">Cart</strong></div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <?php if(session('salah')): ?>
                <div class="alert alert-warning text-center font-weight-bold">
                    <?php echo e(session('salah')); ?>

                </div>
            <?php endif; ?>

            <div class="row mb-5 table-responsive">
                <form class="col-md-12" method="post" action="<?php echo e(route('user.keranjang.update')); ?>">
                    <?php echo csrf_field(); ?>
                    <table class="table table-bordered">
                        <thead class="text-center">
                            <tr>
                                <th class="product-thumbnail">Gambar</th>
                                <th class="product-name">Produk</th>
                                <th class="product-price">Harga</th>
                                <th class="product-quantity">Jumlah</th>
                                <th class="product-total">Total</th>
                                <th class="product-remove">Hapus</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>

                                <?php $subtotal=0; foreach($keranjangs as $keranjang): ?>
                                <td class="product-thumbnail">
                                    <img src="<?php echo e(Storage::url($keranjang->image)); ?>" alt="Image" class="img-fluid"
                                        width="150">
                                </td>
                                <td class="product-name">
                                    <h2 class="h5 text-black"><?php echo e($keranjang->nama_produk); ?></h2>
                                </td>
                                <td>Rp. <?php echo e(number_format($keranjang->price, 2, ',', '.')); ?> </td>
                                <td>
                                    <div class="input-group mb-3" style="max-width: 120px;">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-outline-primary js-btn-minus"
                                                type="button">&minus;</button>
                                        </div>
                                        <input type="hidden" name="id[]" value="<?php echo e($keranjang->id); ?>">
                                        <input type="text" name="qty[]" class="form-control text-center" placeholder=""
                                            aria-label="Example text with button addon" aria-describedby="button-addon1"
                                            value="<?php echo e($keranjang->qty); ?>">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-primary js-btn-plus"
                                                type="button">&plus;</button>
                                        </div>
                                    </div>

                                </td>
                                <?php
                                $total = $keranjang->price * $keranjang->qty;
                                $subtotal = $subtotal + $total;
                                ?>
                                <td>Rp. <?php echo e(number_format($total, 2, ',', '.')); ?></td>
                                <td><a href="<?php echo e(route('user.keranjang.delete', ['id' => $keranjang->id])); ?>"
                                        class="btn btn-primary btn-sm">X</a></td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>

            </div>

            <?php if(!$keranjangs->isEmpty() == true): ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row mb-5">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <button type="submit" class="btn btn-dark btn-sm">Update Keranjang</button>
                            </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6 pl-5">
                        <div class="row justify-content-end">
                            <div class="col-md-7">
                                <div class="row">
                                    <div class="col-md-12 text-right border-bottom mb-3">
                                        <h3 class="text-black h4 text-uppercase text-center">Total Belanja</h3>
                                    </div>
                                </div>
                                <div class="row mb-3 justify-content-center">
                                    <h5 class="text-black text-center text-primary">Rp. <?php echo e(number_format($subtotal, 2, ',', '.')); ?></h5>
                                </div>

                                <div class="row">
                                    <?php if($cekalamat > 0): ?>
                                        <div class="col-md-12">
                                            <a href="<?php echo e(route('user.checkout')); ?>"
                                                class="btn btn-dark btn-block">Checkout</a>
                                            <small class="font-weight-bold">Jika Merubah Quantity Pada Keranjang Maka Klik Update Keranjang Dulu
                                                Sebelum
                                                Melakukan Checkout</small>
                                        </div>
                                    <?php else: ?>
                                        <div class="col-md-12 justify-content-center text-center">
                                            <a href="<?php echo e(route('user.alamat')); ?>"
                                                class="btn btn-dark btn-block">Atur Alamat</a>
                                            <small class=" text-primary">Anda Belum Mengatur Alamat</small>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="container text-center">
                    <h2>Keranjang Kosong</h2><br>
                    <a href="<?php echo e(route('user.produk')); ?>" class="btn btn-sm btn-dark">Belanja Sekarang</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Petshop\resources\views/user/keranjang.blade.php ENDPATH**/ ?>