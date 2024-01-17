 <?php if (isset($component)) { $__componentOriginal5f4c191802e1c30a74446e2fc6ab546ae3383ceb = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Apps::class, []); ?>
<?php $component->withName('apps'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('title'); ?> 
        Data Pembayaran Hutang
     <?php $__env->endSlot(); ?>
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800 font-weight-bold">DATA PEMBAYARAN HUTANG</h1>
        <?php if(session('success')): ?>
            <div class="alert alert-primary shadow" role="alert">
                <?php echo e(session('success')); ?>

            </div>
        <?php elseif($errors->any()): ?>
            <div class="alert alert-danger shadow" role="alert">
                Ada yang salah dengan inputan anda, silahkan input ulang.
            </div>
        <?php endif; ?>
        <?php if(Auth()->user()->role == 'admin'): ?>
            <?php echo $__env->make('admin.payment.tambah', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    </div>
    <div class="card shadow m-3">
        <div class="card-body">
            <table id="mytable" class="display responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Tanggal</th>
                        <th>Nama Supplier</th>
                        <th>Nama Item Dan Piutang</th>
                        <th>Bukti TF</th>
                        <th>pembayaran</th>
                        <th>Sisa</th>
                        <th>status</th>
                        <?php if(Auth()->user()->role == 'admin'): ?>
                            <th>Aksi</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $payment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no => $py): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="text-center"><?php echo e(++$no); ?> </td>
                            <td><?php echo e($py->date); ?></td>
                            <td><?php echo e($py->sp->name); ?></td>
                            <td><?php echo e($py->receivable->name_item); ?> Rp. <?php echo number_format($py->receivable->total,0,',','.'); ?></td>
                            <td>
                                <img src="<?php echo e(Storage::url($py->image)); ?>"
                                    style="object-fit: cover; object-position: center; width: 200px; height: 200px;"
                                    alt="">
                            </td>
                            <td> Rp. <?php echo number_format($py->pay,0,',','.'); ?> </td>
                            <td>
                                <?php
                                    $sisa = $py->receivable->total - $py->pay;
                                ?>

                                Rp. <?php echo number_format($sisa,0,',','.'); ?>
                            </td>
                            <td>
                                <?php if($sisa == 0): ?>
                                    <a href="" class="btn btn-success">LUNAS</a>
                                <?php else: ?>
                                    <a href="" class="btn btn-danger">BELUM LUNAS</a>
                                <?php endif; ?>
                            </td>
                            <?php if(Auth()->user()->role == 'admin'): ?>
                                <td class="text-center">
                                    <div class="d-flex" style="gap: 5px">
                                        <a href="/payment/<?php echo e($py->id); ?>/edit" class="btn btn-warning"><i
                                                class="fa fa-gavel" aria-hidden="true"></i> Ubah</a>
                                        <form action="/payment/<?php echo e($py->id); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('delete'); ?>
                                            <button onclick="return confirm('Yakin ingin menghapus data?')"
                                                class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
 <?php if (isset($__componentOriginal5f4c191802e1c30a74446e2fc6ab546ae3383ceb)): ?>
<?php $component = $__componentOriginal5f4c191802e1c30a74446e2fc6ab546ae3383ceb; ?>
<?php unset($__componentOriginal5f4c191802e1c30a74446e2fc6ab546ae3383ceb); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
<?php /**PATH C:\laragon\www\Petshop\resources\views/admin/payment/index.blade.php ENDPATH**/ ?>