<x-apps>
    <x-slot name="title">supplier</x-slot>
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800 font-weight-bold">DATA SUPPLIER <small>/ {{ $supplier->name }}</small></h1>
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
                        data supplier yang sudah ada. Pastikan data yang Anda masukkan sudah benar dan sesuai dengan
                        data supplier. Data supplier yang sudah diedit tidak dapat dikembalikan ke data sebelumnya.
                    </small>
                </div>
            </div>
        @endif
    </div>
    <div class="card shadow m-4">
        <p class="text-center font-weight-bold my-2">UBAH DATA SUPPLIER</p>
        <div class="card-header mx-3 rounded text-white bg-primary">
            <small>Input kan ulang semua formulir dibawah atau pilih batal.</small>
        </div>
        <div class="card-header bg-white mb-3">
            <form action="/sp/{{ $supplier->id }}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="exampleInputUsername1">Nama Pelanggan <small class="text-danger">Lama</small></label>
                        <input type="text" class="form-control" disabled value="{{ $supplier->name }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputUsername1">Nama Pelanggan <small class="text-success">Baru</small></label>
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        @error('name')
                            <small class="text-danger fw-bold">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="exampleInputUsername1">No. Telphone <small class="text-danger">Lama</small></label>
                        <input type="number" class="form-control" disabled value="{{ $supplier->no_telp }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputUsername1">No. Telphone <small class="text-success">Baru</small></label>
                        <input type="number" class="form-control" name="no_telp" value="{{ old('no_telp') }}">
                        @error('no_telp')
                        <small class="text-danger fw-bold">{{ $message }}</small>
                    @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="exampleInputUsername1">Alamat <small class="text-danger">Lama</small></label>
                        <input type="text" class="form-control" disabled value="{{ $supplier->address }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputUsername1">Alamat <small class="text-success">Baru</small></label>
                        <input type="text" class="form-control" name="address" value="{{ old('address') }}">
                        @error('address')
                        <small class="text-danger fw-bold">{{ $message }}</small>
                    @enderror
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
</x-apps>
