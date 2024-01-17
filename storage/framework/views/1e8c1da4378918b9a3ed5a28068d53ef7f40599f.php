<!-- Button trigger modal -->
<button type="button" class="btn btn-primary font-weight-bold" data-toggle="modal" data-target="#exampleModal">
    <i class="fa fa-credit-card" aria-hidden="true"></i> Tambah
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="alert bg-primary text-white" role="alert">
                    <small class="modal-title" id="exampleModalLabel">
                        <strong><i class="fas fa-regular fa-bell"></i> Peringatan!!!</strong> <br>Anda akan menambahkan
                        data hutang baru. Pastikan data yang Anda masukkan sudah benar dan sesuai dengan Data
                        hutang. Data hutang yang sudah ditambahkan tidak dapat dihapus, hanya dapat diedit. Apakah
                        Anda yakin ingin melanjutkan?
                        </p>
                </div>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo e(route('payment.store')); ?>" method="POST"  enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="form-row mb-2">
                        <div class="col">
                            <label for="exampleInputUsername1">Tanggal</label>
                            <input type="date" class="form-control" name="date">
                            <?php $__errorArgs = ['date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <small class="text-danger"><?php echo e($message); ?></small>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="col">
                            <label for="code">Nama Supplier</label>
                            <select name="sp_id" id="code" class="form-control" >
                                <?php $__currentLoopData = $supplier; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($sp->id); ?>"><?php echo e($sp->id); ?>. <?php echo e($sp->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col">
                            <label for="code">Piutang</label>
                            <select name="receivable_id" id="code" class="form-control" >
                                <?php $__currentLoopData = $receivable; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($rv->id); ?>"><?php echo e($rv->id); ?>.) <?php echo e($rv->name_item); ?> Rp. <?php echo number_format($rv->total,0,',','.'); ?> </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row mb-2">
                        <div class="col">
                            <label for="exampleInputUsername1">Bukti Transfer</label>
                            <input type="file" class="form-control" name="image" accept="image/jpeg, image/png, image/jpg, image/gif">
                            <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <small class="text-danger"><?php echo e($message); ?></small>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="col">
                            <label for="exampleInputUsername1">Pembayaran</label>
                            <input type="number" class="form-control" name="pay">
                            <?php $__errorArgs = ['pay'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <small class="text-danger"><?php echo e($message); ?></small>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                       
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary text-right"><i class="fas fa-check"></i>
                            Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\laragon\www\Petshop\resources\views/admin/payment/tambah.blade.php ENDPATH**/ ?>