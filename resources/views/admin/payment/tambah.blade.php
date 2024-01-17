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
                <form action="{{ route('payment.store') }}" method="POST"  enctype="multipart/form-data">
                    @csrf
                    <div class="form-row mb-2">
                        <div class="col">
                            <label for="exampleInputUsername1">Tanggal</label>
                            <input type="date" class="form-control" name="date">
                            @error('date')
                                <small class="text-danger">{{ $message}}</small>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="code">Nama Supplier</label>
                            <select name="sp_id" id="code" class="form-control" >
                                @foreach ($supplier as $sp)
                                    <option value="{{ $sp->id }}">{{ $sp->id }}. {{ $sp->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="code">Piutang</label>
                            <select name="receivable_id" id="code" class="form-control" >
                                @foreach ($receivable as $rv)
                                    <option value="{{ $rv->id }}">{{ $rv->id }}.) {{ $rv->name_item }} @currency($rv->total) </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row mb-2">
                        <div class="col">
                            <label for="exampleInputUsername1">Bukti Transfer</label>
                            <input type="file" class="form-control" name="image" accept="image/jpeg, image/png, image/jpg, image/gif">
                            @error('image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="exampleInputUsername1">Pembayaran</label>
                            <input type="number" class="form-control" name="pay">
                            @error('pay')
                                <small class="text-danger">{{ $message}}</small>
                            @enderror
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
