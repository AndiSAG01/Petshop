 <?php if (isset($component)) { $__componentOriginal5f4c191802e1c30a74446e2fc6ab546ae3383ceb = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Apps::class, []); ?>
<?php $component->withName('apps'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('title'); ?> 
        Data Pelanggan
     <?php $__env->endSlot(); ?>
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800 font-weight-bold">DATA PELANGGAN</h1>
        <?php if(session('success')): ?>
            <div class="alert alert-primary shadow" role="alert">
                <?php echo e(session('success')); ?>

            </div>
        <?php elseif($errors->any()): ?>
            <div class="alert alert-danger shadow" role="alert">
                Ada yang salah dengan inputan anda, silahkan input ulang.
            </div>
        <?php endif; ?>
        <?php echo $__env->make('admin.supplier.tambah', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    <div class="card shadow m-3">
        <div class="card-body">
            <table id="mytable" class="display responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Pelaggan</th>
                        <th>alamat</th>
                        <th>No Telphone</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $supplier; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no => $sp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="text-center"><?php echo e(++$no); ?> </td>
                            <td><?php echo e($sp->name); ?></td>
                            <td><?php echo e($sp->address); ?></td>
                            <td><?php echo e($sp->no_telp); ?></td>
                            <td class="text-center">
                                <div class="d-flex" style="gap: 5px">
                                    <a href="/supplier/<?php echo e($sp->id); ?>/edit" class="btn btn-warning"><i
                                            class="fa fa-gavel" aria-hidden="true"></i> Ubah</a>
                                    <form action="/supplier/<?php echo e($sp->id); ?>" method="POST">
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
<?php /**PATH C:\laragon\www\Petshop\resources\views/admin/supplier/index.blade.php ENDPATH**/ ?>