<x-apps>
    <x-slot name="title">PRODUK TOKO</x-slot>
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800 font-weight-bold">PRODUK TOKO</h1>
        @if (session('success'))
            <div class="alert alert-primary shadow" role="alert">
                {{ session('success') }}
            </div>
        @elseif ($errors->any())
            <div class="alert alert-danger shadow" role="alert">
                Ada yang salah dengan inputan anda, silahkan input ulang.
            </div>
        @endif
        @include('admin.barang.tambah')
    </div>
    <div class="card shadow m-3">
        <div class="card-body">
            <table id="mytable" class="display responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Berat</th>
                        <th>Stok</th>
                        <th>Gambar</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($thing as $no => $product)
                        <tr>
                            <td>{{ ++$no }}</td>
                            <td>{{ $product->name }}</td>
                            <td>Rp. {{ number_format($product->price, 2, ',', '.') }}</td>
                            <td>{{ $product->weigth }}gr</td>
                            <td>{{ $product->stok }}</td>
                            <td><img src="{{ Storage::url($product->image) }}" class="rounded-circle"
                                    style="object-fit: cover;
                              object-position: center; width: 25px; height:25px;"
                                    alt="{{ $product->name }}">
                            </td>
                            <td>
                                <div class="d-flex" style="gap: 5px">
                                    <a href="{{ route('admin.thing.edit', ['id' => $product->id])}}"
                                        class="btn btn-warning btn-sm"><i class="fa fa-gavel" aria-hidden="true"></i>
                                        Ubah</a>
                                    <a href="{{ route('admin.thing.delete', ['id' => $product->id]) }}"
                                        onclick="return confirm('Yakin Hapus data')" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i> Hapus
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-apps>
