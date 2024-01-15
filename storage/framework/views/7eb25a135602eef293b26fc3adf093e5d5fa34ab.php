 <?php if (isset($component)) { $__componentOriginal5f4c191802e1c30a74446e2fc6ab546ae3383ceb = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Apps::class, []); ?>
<?php $component->withName('apps'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('title'); ?> Suppliers <?php $__env->endSlot(); ?>
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800 font-weight-bold">SUPPLIERS</h1>
        <?php if(session('success')): ?>
            <div class="alert alert-primary shadow" role="alert">
                <?php echo e(session('success')); ?>

            </div>
        <?php elseif($errors->any()): ?>
            <div class="alert alert-danger shadow" role="alert">
                Ada yang salah dengan inputan anda, silahkan input ulang.
            </div>
            <?php elseif(session('danger')): ?>
            <div class="alert alert-danger shadow" role="alert">
                <?php echo e(session('danger')); ?>

            </div>
        <?php else: ?>
            <div class="media bg-primary rounded mb-3 text-white p-3">
                <img class="align-self-center mr-3" width="230px" src="/layouts/drawKit/vector (14).svg"
                    alt="Generic placeholder image">
                <div class="media-body">
                    <small> <strong><i class="fas fa-regular fa-bell"></i> Peringatan!!!</strong><br>Pada menu admin
                        bagian
                        suppliers, Anda dapat melihat dan nama supplier dan nomor supplier yang digunakan melihat
                        informasi supplier. Nomor supplier ini harus sesuai dengan nama dan identitas Anda
                        sebagai admin. Terima kasih atas kerjasama Anda.
                    </small>
                </div>
            </div>
        <?php endif; ?>
        <?php echo $__env->make('admin.suppliers.tambah', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <div class="card shadow m-4">
        <div class="card-body">
            <table id="mytable" class="display responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Nama Supplier</th>
                        <th>No HandPhone</th>
                        <th>Nama Barang</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $supplier; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no => $sup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e(++$no); ?></td>
                            <td><?php echo e($sup->name); ?></td>
                            <td><?php echo e($sup->no_telp); ?></td>
                            <td><?php echo e($sup->name_item); ?></td>
                            <td style="gap: 3px">
                                <a href="<?php echo e(route('admin.supplier.edit', ['id' => $sup->id])); ?>"
                                    class="btn btn-warning btn-sm">
                                    <i class="fa fa-gavel" aria-hidden="true"></i> Ubah
                                </a>
                                <a href="<?php echo e(route('admin.supplier.delete', ['id' => $sup->id])); ?>"
                                    onclick="return confirm('Yakin Hapus data')" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i> Hapus
                                </a>
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
<?php /**PATH C:\laragon\www\Petshop\resources\views/admin/suppliers/index.blade.php ENDPATH**/ ?>