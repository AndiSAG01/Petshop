
<?php $__env->startSection('content'); ?>
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0">
                    <a href="#">Home</a>
                    <span class="mx-2 mb-0">/</span>
                    <a href="#">Order</a>
                    <span class="mx-2 mb-0">/</span>
                    <strong class="text-black">History</strong>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row mb-3">
                <div class="col-md-12">
                    <h4 class="text-center font-weight-bold text-primary">Belum Dibayar</h4>
                    <hr>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">Invoice</th>
                                    <th class="product-name">Total</th>
                                    <th class="product-price">Status</th>
                                    <th class="product-quantity" width="20%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $o): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($o->invoice); ?></td>
                                        <td><?php echo e($o->subtotal + $o->biaya_cod); ?></td>
                                        <td><?php echo e($o->name); ?></td>
                                        <td>
                                            <div class="d-flex" style="gap: 5px">
                                                <a href="<?php echo e(route('user.order.pembayaran', ['id' => $o->id])); ?>"
                                                    class="btn btn-sm btn-success">Bayar</a>
                                                <a href="<?php echo e(route('user.order.pesanandibatalkan', ['id' => $o->id])); ?>"
                                                    onclick="return confirm('Yakin ingin membatalkan pesanan')"
                                                    class="btn btn-sm btn-danger">Batalkan</a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>

            <div class="container">
                <div class="row mb-3">
                    <div class="col-md-12">
                        <h4 class="text-center font-weight-bold text-primary">Sedang Dalam Proses</h4>
                        <hr>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-md-12">
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">Invoice</th>
                                    <th class="product-name">Total</th>
                                    <th class="product-price">Status</th>
                                    <th class="product-quantity" width="20%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $dicek; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $o): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($o->invoice); ?></td>
                                        <td><?php echo e($o->subtotal + $o->biaya_cod); ?></td>
                                        <td>
                                            <?php if($o->name == 'Perlu Di Cek'): ?>
                                                Sedang Di Cek
                                            <?php else: ?>
                                                <?php echo e($o->name); ?>

                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo e(route('user.order.detail', ['id' => $o->id])); ?>"
                                                class="btn btn-sm btn-success">Detail</a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="container">
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <h4 class="text-center font-weight-bold text-primary">Riwayat Pesanan Anda</h4>
                            <hr>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <th class="product-thumbnail">Invoice</th>
                                            <th class="product-name">Total</th>
                                            <th class="product-price">Status</th>
                                            <th class="product-quantity" width="20%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $histori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $o): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($o->invoice); ?></td>
                                                <td><?php echo e($o->subtotal + $o->biaya_cod); ?></td>
                                                <td><?php echo e($o->name); ?></td>
                                                <td>
                                                    <a href="<?php echo e(route('user.order.detail', ['id' => $o->id])); ?>"
                                                        class="btn btn-sm btn-success">Detail</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>
                </div>
            <?php $__env->stopSection(); ?>

<?php echo $__env->make('user.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Petshop\resources\views/user/order/order.blade.php ENDPATH**/ ?>