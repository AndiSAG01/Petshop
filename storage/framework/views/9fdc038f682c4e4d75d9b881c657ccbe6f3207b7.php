 <?php if (isset($component)) { $__componentOriginal5f4c191802e1c30a74446e2fc6ab546ae3383ceb = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Apps::class, []); ?>
<?php $component->withName('apps'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('title'); ?> supplier <?php $__env->endSlot(); ?>
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800 font-weight-bold">DATA SUPPLIER <small>/ <?php echo e($supplier->name); ?></small></h1>
        <?php if(session('success')): ?>
            <div class="alert alert-primary shadow" role="alert">
                <?php echo e(session('success')); ?>

            </div>
        <?php elseif($errors->any()): ?>
            <div class="alert alert-danger shadow" role="alert">
                Ada yang salah dengan inputan anda, silahkan input ulang.
            </div>
        <?php else: ?>
            <div class="media bg-primary rounded mb-3 text-white p-3">
                <img class="align-self-center mr-3" width="230px" src="/layouts/drawKit/vector (17).svg"
                    alt="Generic placeholder image">
                <div class="media-body">
                    <small>
                        <strong><i class="fas fa-regular fa-bell"></i> Peringatan!!!</strong><br>Anda akan mengedit
                        data supplier yang sudah ada. Pastikan data yang Anda masukkan sudah benar dan sesuai dengan
                        data supplier. Data supplier yang sudah diedit tidak dapat dikembalikan ke data sebelumnya.
                    </small>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <div class="card shadow m-4">
        <p class="text-center font-weight-bold my-2">UBAH DATA SUPPLIER</p>
        <div class="card-header mx-3 rounded text-white bg-primary">
            <small>Input kan ulang semua formulir dibawah atau pilih batal.</small>
        </div>
        <div class="card-header bg-white mb-3">
            <form action="/supplier/<?php echo e($supplier->id); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="exampleInputUsername1">Nama Pelanggan <small class="text-danger">Lama</small></label>
                        <input type="text" class="form-control" disabled value="<?php echo e($supplier->name); ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputUsername1">Nama Pelanggan <small class="text-success">Baru</small></label>
                        <input type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>">
                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <small class="text-danger fw-bold"><?php echo e($message); ?></small>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="exampleInputUsername1">No. Telphone <small class="text-danger">Lama</small></label>
                        <input type="number" class="form-control" disabled value="<?php echo e($supplier->no_telp); ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputUsername1">No. Telphone <small class="text-success">Baru</small></label>
                        <input type="number" class="form-control" name="no_telp" value="<?php echo e(old('no_telp')); ?>">
                        <?php $__errorArgs = ['no_telp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <small class="text-danger fw-bold"><?php echo e($message); ?></small>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="exampleInputUsername1">Alamat <small class="text-danger">Lama</small></label>
                        <input type="text" class="form-control" disabled value="<?php echo e($supplier->address); ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputUsername1">Alamat <small class="text-success">Baru</small></label>
                        <input type="text" class="form-control" name="address" value="<?php echo e(old('address')); ?>">
                        <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <small class="text-danger fw-bold"><?php echo e($message); ?></small>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="text-right">
                        <a href="/admin/supplier" class="btn btn-secondary"><i class="fa fa-times"
                                aria-hidden="true"></i> Batal</a>
                        <button type="submit" class="btn btn-primary text-right"><i class="fas fa-check"></i>
                            Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
 <?php if (isset($__componentOriginal5f4c191802e1c30a74446e2fc6ab546ae3383ceb)): ?>
<?php $component = $__componentOriginal5f4c191802e1c30a74446e2fc6ab546ae3383ceb; ?>
<?php unset($__componentOriginal5f4c191802e1c30a74446e2fc6ab546ae3383ceb); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
<?php /**PATH C:\laragon\www\Petshop\resources\views/admin/supplier/edit.blade.php ENDPATH**/ ?>