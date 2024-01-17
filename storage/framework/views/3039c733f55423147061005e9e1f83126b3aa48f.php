 <?php if (isset($component)) { $__componentOriginal5f4c191802e1c30a74446e2fc6ab546ae3383ceb = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Apps::class, []); ?>
<?php $component->withName('apps'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('title'); ?> 
        Data Piutang
     <?php $__env->endSlot(); ?>
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800 font-weight-bold">DATA PIUTANG</h1>
        <?php if(session('success')): ?>
            <div class="alert alert-primary shadow" role="alert">
                <?php echo e(session('success')); ?>

            </div>
        <?php elseif($errors->any()): ?>
            <div class="alert alert-danger shadow" role="alert">
                Ada yang salah dengan inputan anda, silahkan input ulang.
            </div>
        <?php endif; ?>
        <?php echo $__env->make('admin.piutang.tambah', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    <div class="card shadow m-3">
        <div class="card-body">
            <table id="mytable" class="display responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Pelanggan</th>
                        <th>Nama Barang</th>
                        <th>Jumlah Barang</th>
                        <th>Harga Satuan</th>
                        <th>Jumalh Total Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $receivable; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no => $pt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="text-center"><?php echo e(++$no); ?> </td>
                            <td><?php echo e($pt->supplier->name); ?></td>
                            <td><?php echo e($pt->name_item); ?></td>
                            <td><?php echo e($pt->quantity); ?></td>
                            <td>Rp. <?php echo number_format($pt->price,0,',','.'); ?> </td>
                            <td>
                                Rp. <?php echo number_format($pt->total,0,',','.'); ?> 
                            </td>
                            <td class="text-center">
                                <div class="d-flex" style="gap: 5px">
                                    <a href="/receivable/<?php echo e($pt->id); ?>/edit" class="btn btn-warning"><i
                                            class="fa fa-gavel" aria-hidden="true"></i> Ubah</a>
                                    <form action="/receivable/<?php echo e($pt->id); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('delete'); ?>
                                        <button onclick="return confirm('Yakin ingin menghapus data?')"
                                            class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
                                    </form>
                                </div>
                            </td>
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
<?php /**PATH C:\laragon\www\Petshop\resources\views/admin/piutang/index.blade.php ENDPATH**/ ?>