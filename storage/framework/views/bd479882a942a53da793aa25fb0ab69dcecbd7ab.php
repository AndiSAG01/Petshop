 <?php if (isset($component)) { $__componentOriginal5f4c191802e1c30a74446e2fc6ab546ae3383ceb = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Apps::class, []); ?>
<?php $component->withName('apps'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('title'); ?> Kategori Produk <?php $__env->endSlot(); ?>
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800 font-weight-bold">KATEGORI PRODUK</h1>
        <?php if(session('success')): ?>
            <div class="alert alert-primary shadow" role="alert">
                <?php echo e(session('success')); ?>

            </div>
        <?php elseif($errors->any()): ?>
            <div class="alert alert-danger shadow" role="alert">
                Ada yang salah dengan inputan anda, silahkan input ulang.
            </div>
            
        <?php endif; ?>
        <?php echo $__env->make('admin.categories.tambah', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <div class="card shadow m-3">
        <div class="card-body">
            <table id="mytable" class="display responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Kategori produk</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e(++$no); ?></td>
                            <td><?php echo e($item->name); ?></td>
                            <td>
                                <div class="d-flex" style="gap: 5px">
                                    <a href="<?php echo e(route('admin.categories.edit', ['id' => $item->id])); ?>"
                                        class="btn btn-warning btn-sm"><i class="fa fa-gavel" aria-hidden="true"></i>
                                        Ubah</a>
                                    <a href="<?php echo e(route('admin.categories.delete', ['id' => $item->id])); ?>"
                                        onclick="return confirm('Yakin Hapus data')" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i> Hapus
                                    </a>
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
<?php /**PATH C:\laragon\www\Petshop\resources\views/admin/categories/index.blade.php ENDPATH**/ ?>