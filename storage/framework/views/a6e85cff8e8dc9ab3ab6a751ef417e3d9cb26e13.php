 <?php if (isset($component)) { $__componentOriginal5f4c191802e1c30a74446e2fc6ab546ae3383ceb = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Apps::class, []); ?>
<?php $component->withName('apps'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('title'); ?> 
        Informasi Toko
     <?php $__env->endSlot(); ?>
    <div class="container">
        <h1 class="h3 mb-2 text-gray-800 font-weight-bold">INFORMASI TOKO</h1>
        <?php if(session('success')): ?>
            <div class="alert alert-primary" role="alert">
                <strong><?php echo e(session('success')); ?></strong>
            </div>
        <?php elseif($errors->any()): ?>
            <div class="alert alert-danger" role="alert">
                <strong> Ada yang salah dengan inputan anda, silahkan input ulang 🥱</strong>
            </div>
        <?php else: ?>
            <div class="media bg-primary rounded mb-3 text-white p-3">
                <img class="align-self-center mr-3" width="230px" src="/layouts/drawKit/vector (18).svg"
                    alt="Generic placeholder image">
                <div class="media-body">
                    <small>
                        <strong><i class="fas fa-regular fa-bell"></i> Peringatan!!!</strong> <br>
                        Pengaturan alamat toko untuk memberikan kepercayaan ke pada pelanggan, harap pastikan nginputkan
                        alamat yang benar dan tepat.
                    </small>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <div class="card shadow m-3">
        <form action="/identity/<?php echo e($store->id); ?>" method="POST">
            <?php echo method_field('PUT'); ?>
            <?php echo csrf_field(); ?>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="name_store" class="form-label font-weight-bold">Nama Toko</label>
                            <input type="text" name="name_store" id="name_store" class="form-control"
                                value="<?php echo e($store->name_store); ?>" aria-describedby="helpId">
                            <?php $__errorArgs = ['name_store'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <small id="helpId" class="text-danger"><?php echo e($message); ?></small>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="telp" class="form-label font-weight-bold">Telp Toko</label>
                            <input type="telp" name="telp" id="telp" class="form-control"
                                value="<?php echo e($store->telp); ?>" aria-describedby="helpId">
                            <?php $__errorArgs = ['telp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <small id="helpId" class="text-danger"><?php echo e($message); ?></small>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label font-weight-bold">Deskripsi Toko</label>
                    <textarea class="form-control" name="description" id="description" rows="3"><?php echo e($store->description); ?></textarea>
                    <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <small id="helpId" class="text-danger"><?php echo e($message); ?></small>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="mab-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
    <div class="card shadow m-3">
        <div class="card-body">
            <?php if($cekalamat < 1): ?>
                <div class="row">
                    <div class="col-md-12">
                        <form action="<?php echo e(route('admin.pengaturan.simpanalamat')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label>Provinsi</label>
                                <select required name="province_id" id="province_id" class="form-control">
                                    <?php $__currentLoopData = $provinces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $province): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($province->province_id); ?>"><?php echo e($province->title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-grup">
                                <label for="">Kota/Kabupaten</label>
                                <select name="cities_id" id="cities_id" class="form-control" required>
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <label>Detail Alamat</label>
                                <input type="text" class="form-control" name="detail" required>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary text-right">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            <?php else: ?>
                <div class="row">
                    <div class="col-md-12">
                        <table>
                            <tr>
                                <th>Alamat Sekarang</th>
                                <th>:</th>
                                <td><?php echo e($alamat->detail); ?> , <?php echo e($alamat->kota); ?> , <?php echo e($alamat->prov); ?></td>
                            </tr>
                        </table>
                        <small><a href="<?php echo e(route('admin.pengaturan.ubahalamat', ['id' => $alamat->id])); ?>">Klik untuk
                                mengubah alamat toko</a></small>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <?php $__env->startSection('js'); ?>
        <script type="text/javascript">
            var toHtml = (tag, value) => {
                $(tag).html(value);
            }
            $(document).ready(function() {
                //  $('#province_id').select2();
                //  $('#cities_id').select2();
                $('#province_id').on('change', function() {
                    var id = $('#province_id').val();
                    var url = window.location.href;
                    $.ajax({
                        type: 'GET',
                        url: url + '/getcity/' + id,
                        dataType: 'json',
                        success: function(data) {
                            var op = '<option value="">Pilih Kota</option>';
                            if (data.length > 0) {
                                var i = 0;
                                for (i = 0; i < data.length; i++) {
                                    op +=
                                        `<option value="${data[i].city_id}">${data[i].title}</option>`
                                }
                            }
                            toHtml('[name="cities_id"]', op);
                        }
                    })
                })
            });
        </script>
    <?php $__env->stopSection(); ?>
 <?php if (isset($__componentOriginal5f4c191802e1c30a74446e2fc6ab546ae3383ceb)): ?>
<?php $component = $__componentOriginal5f4c191802e1c30a74446e2fc6ab546ae3383ceb; ?>
<?php unset($__componentOriginal5f4c191802e1c30a74446e2fc6ab546ae3383ceb); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
<?php /**PATH C:\laragon\www\Petshop\resources\views/admin/pengaturan/alamat.blade.php ENDPATH**/ ?>