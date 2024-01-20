<x-apps>
    <x-slot name="title">
        Produk Barang
    </x-slot>
    <div class="container">
        <h1 class="h3 mb-2 text-gray-800 font-weight-bold">PRODUK BARANG <small>/ {{ $thing->name }}</small></h1>

    </div>

    <form action="{{ route('admin.thing.update', ['id' => $thing->id]) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        <div class="card shadow m-3">
            <div class="card-header font-weight-bold text-baseline">
                <div class="row">
                    <div class="col-4">
                        <img src="{{ Storage::url($thing->image) }}" class="rounded border-3"
                            style="object-fit: cover;
            object-position: center; width: 150px; height:150px;"
                            alt="{{ $thing->name }}">
                    </div>
                    <div class="col-8">
                        <div class="custom-file">
                            <label for="exampleFormControlFile1">Foto produk</label>
                            <input type="file" name="image" class="form-control-file btn btn-primary"
                                id="exampleFormControlFile1">
                            <small class="text-danger">Kosongkan jika tidak mengubah gambar</small>

                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputUsername1">Nama Produk</label>
                    <input required type="text" class="form-control" name="name" value="{{ $thing->name }}">
                    @error('name')
                        <small class="text-danger form-text">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-row">
                    <div class="col">
                        <label for="exampleInputUsername1">Stok</label>
                        <input required type="number" class="form-control" name="stok" value="{{ $thing->stok }}">
                        @error('stok')
                            <small class="text-danger form-text">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label for="exampleInputUsername1">Berat (gram)</label>
                        <input required type="number" class="form-control" name="weigth"
                            value="{{ $thing->weigth }}">
                        @error('weigth')
                            <small class="text-danger form-text">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="exampleInputUsername1">Harga</label>
                        <input required type="number" class="form-control" name="price"
                            value="{{ $thing->price }}">
                        @error('price')
                            <small class="text-danger form-text">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Deskripsi</label>
                    <textarea name="description" id="" cols="30" rows="5" class="form-control" required>{{ $thing->description }}</textarea>
                    @error('description')
                        <small class="text-danger form-text">{{ $message }}</small>
                    @enderror
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary text-right"><i class="fas fa-check"></i>
                        Simpan</button>
                </div>
            </div>
        </div>
    </form>
</x-apps>
