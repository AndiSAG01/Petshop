<x-apps>
    <x-slot name="title">
        Produk Barang
    </x-slot>
    <div class="container">
        <h1 class="h3 mb-2 text-gray-800 font-weight-bold">PRODUK BARANG <small>/ {{ $thing->name }}</small></h1>
    </div>
    <form action="{{ route('admin.purchase.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="thing_id" value="{{ $thing->id }}">
        <div class="card shadow m-3">
            <div class="card-header font-weight-bold text-baseline">
                <div class="row">
                    <div class="col-4">
                        <img src="{{ Storage::url($thing->image) }}" class="rounded border-3"
                            style="object-fit: cover; object-position: center; width: 150px; height:150px;"
                            alt="{{ $thing->name }}">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputUsername1">Nama Produk</label>
                    <input type="text" class="form-control" disabled name="name" value="{{ $thing->name }}">
                </div>
                <div class="form-row">
                    <div class="col">
                        <label for="exampleInputUsername1">Stok</label>
                        <input type="number" class="form-control" disabled name="stok" value="{{ $thing->stok }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label for="exampleInputUsername1">Berat (gram)</label>
                        <input type="number" class="form-control" disabled name="weigth" value="{{ $thing->weigth }}">
                    </div>
                    <div class="col">
                        <label for="exampleInputUsername1">Harga</label>
                        <input type="number" class="form-control" disabled name="price" value="{{ $thing->price }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Deskripsi</label>
                    <textarea class="form-control" disabled required>{{ $thing->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="">Jumlah Pesanan</label>
                    <input type="number" name="quantity" class="form-control" required>
                    @error('quantity')
                        <small class="text-danger form-text">{{ $message }}</small>
                    @enderror
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Pesan</button>
                </div>
            </div>
        </div>
    </form>
</x-apps>
