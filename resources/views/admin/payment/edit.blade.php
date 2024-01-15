<x-apps>
    <x-slot name="title">supplier</x-slot>
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800 font-weight-bold">DATA PIUTANG <small>/
                {{ $payment->sp->name }}</small></h1>
        @if (session('success'))
            <div class="alert alert-primary shadow" role="alert">
                {{ session('success') }}
            </div>
        @elseif ($errors->any())
            <div class="alert alert-danger shadow" role="alert">
                Ada yang salah dengan inputan anda, silahkan input ulang.
            </div>
        @else
            <div class="media bg-primary rounded mb-3 text-white p-3">
                <img class="align-self-center mr-3" width="230px" src="/layouts/drawKit/vector (17).svg"
                    alt="Generic placeholder image">
                <div class="media-body">
                    <small>
                        <strong><i class="fas fa-regular fa-bell"></i> Peringatan!!!</strong><br>Anda akan mengedit
                        data piutang yang sudah ada. Pastikan data yang Anda masukkan sudah benar dan sesuai dengan
                        data piutang. Data piutang yang sudah diedit tidak dapat dikembalikan ke data sebelumnya.
                    </small>
                </div>
            </div>
        @endif
    </div>
    <div class="card shadow m-4">
        <p class="text-center font-weight-bold my-2">UBAH DATA PIUTANG</p>
        <div class="card-header mx-3 rounded text-white bg-primary">
            <small>Input kan ulang semua formulir dibawah atau pilih batal.</small>
        </div>
        <div class="card-header bg-white mb-3">
            <form action="/payment/{{ $payment->id }}" method="POST" enctype="multipart/form-data" >
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="exampleInputUsername1">Tanggal <small class="text-danger">Lama</small></label>
                        <input type="date" class="form-control" disabled value="{{ $payment->date }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputUsername1">Tanggal <small class="text-success">Baru</small></label>
                        <input type="date" class="form-control" name="date" value="{{ old('date') }}">
                        @error('date')
                            <small class="text-danger fw-bold">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="exampleInputUsername1">Nama Supplier <small class="text-danger">Lama</small></label>
                        <input type="text" class="form-control" disabled value="{{ $payment->sp->name }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputUsername1">Nama supplier <small
                                class="text-success">Baru</small></label>
                        <select name="sp_id" id="code" class="form-control">
                            @foreach ($supplier as $sps)
                            <option value="{{ $sps->id }}">{{ $sps->name }}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="exampleInputUsername1">Piutang <small class="text-danger">Lama</small></label>
                        <input type="number" class="form-control" disabled value="{{ $payment->receivable->total }}">
                    </div>
                    <div class="col">
                        <label for="code">Piutang</label>
                        <select name="receivable_id" id="code" class="form-control" >
                            @foreach ($receivable as $rv)
                            <option value="{{ $rv->id }}">{{ $rv->id }} ). {{ $rv->total }}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="exampleInputUsername1">Pembayaran <small class="text-danger">Lama</small></label>
                        <input type="number" class="form-control" disabled value="{{ $payment->pay }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputUsername1">Pembayaran <small
                                class="text-success">Baru</small></label>
                        <input type="number" class="form-control" name="pay" value="{{ old('pay') }}">
                        @error('pay')
                            <small class="text-danger fw-bold">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputUsername1"> Bukti TF <small class="text-danger">Lama</small></label>
                        <input type="image" class="form-control" disabled value= <img src="{{ Storage::url($payment->image) }}"
                        style="object-fit: cover; object-position: center; width: 200px; height: 200px;" alt="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputUsername1">Bukti TF <small
                            class="text-success">Baru</small></label>
                            <input type="file" class="form-control" name="image" accept="image/jpeg, image/png, image/jpg, image/gif">
                            @error('image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                    </div>
                    <div class="text-right">
                        <a href="/admin/receivable" class="btn btn-secondary"><i class="fa fa-times"
                                aria-hidden="true"></i> Batal</a>
                        <button type="submit" class="btn btn-primary text-right"><i class="fas fa-check"></i>
                            Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-apps>
