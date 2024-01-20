<!-- Button trigger modal -->
<button type="button" class="btn btn-primary font-weight-bold" data-toggle="modal" data-target="#exampleModal">
    <i class="fas fa-solid fa-cube"></i> Tambah
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="alert alert-warning" role="alert">
                    <small class="modal-title" id="exampleModalLabel">
                        <strong><i class="fas fa-regular fa-bell"></i> Peringatan!!!</strong> <br>Anda harus memasukkan
                        informasi produk secara lengkap dan
                        akurat sebelum menyimpannya. Pastikan Anda memilih kategori, harga, stok, deskripsi, dan gambar
                        produk yang tepat.
                        </p>
                </div>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.thing.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="flex">
                        <div class="w-3/4">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Nama Produk</label>
                                <input required type="text" class="form-control" value="{{ old('name') }}"
                                    name="name">
                                @error('name')
                                    <small class="text-danger form-text">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Berat (gram)</label>
                                <input required type="number" value="{{ old('weigth') }}" class="form-control"
                                    name="weigth">
                                @error('weigth')
                                    <small class="text-danger form-text">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Harga</label>
                                <input required type="number" value="{{ old('price') }}" class="form-control"
                                    name="price">
                                @error('price')
                                    <small class="text-danger form-text">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Stok</label>
                                <input required value="{{ old('stok') }}" type="number" class="form-control"
                                    name="stok">
                                @error('stok')
                                    <small class="text-danger form-text">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Deskripsi</label>
                                <textarea name="description" id="" cols="30" rows="3" class="form-control" required>{{ old('description') }}
									</textarea>
                                @error('description')
                                    <small class="text-danger form-text">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>File upload</label>
                                <input required type="file" name="image" class="form-control-file">
                                @error('image')
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
            </div>
        </div>
    </div>
</div>
