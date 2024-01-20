<x-apps>
    <x-slot name="title">PRODUK TOKO</x-slot>
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800 font-weight-bold">INFORMASI BARANG DI SUPPLIER</h1>
    </div>
    <div class="card shadow m-3">
        <div class="card-body">
            <table id="mytable" class="display responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th class="text-center" width="5%">No</th>
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
                            <td class="text-center">{{ ++$no }}</td>
                            <td>{{ $product->name }}</td>
                            <td>Rp. {{ number_format($product->price, 2, ',', '.') }}</td>
                            <td>{{ $product->weigth }}gr</td>
                            <td>
                                @if ($product->stok === 0)
                                    <a href="" class="btn btn-danger btn-block">Stock Habis</a>
                                @else
                                    {{ $product->stok }}
                                @endif
                            </td>
                            <td><img src="{{ Storage::url($product->image) }}" 
                                    style="object-fit: cover;
                              object-position: center; width: 150px; height:150px;"
                                    alt="{{ $product->name }}">
                            </td>
                            <td>
                                @if (Auth()->user()->role == 'admin')
                                    <a href="{{ route('admin.purchase.pesan', ['id' => $product->id])}}" class="btn btn-primary">Pesan Barang</a>
                                @elseif (Auth()->user()->role == 'supplier')
                                <div class="d-flex" style="gap: 5px">
                                    <a href="{{ route('admin.thing.edit', ['id' => $product->id])}}"
                                        class="btn btn-warning btn-sm"><i class="fa fa-gavel" aria-hidden="true"></i>
                                        Ubah</a>
                                    <a href="{{ route('admin.thing.delete', ['id' => $product->id]) }}"
                                        onclick="return confirm('Yakin Hapus data')" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i> Hapus
                                    </a>
                                </div>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800 font-weight-bold">DATA PEMESANAN</h1>
        @if (session('success'))
            <div class="alert alert-primary shadow" role="alert">
                {{ session('success') }}
            </div>
        @elseif ($errors->any())
            <div class="alert alert-danger shadow" role="alert">
                Ada yang salah dengan inputan anda, silahkan input ulang.
            </div>
        @endif
    </div>
    <div class="card shadow m-3">
        <div class="card-body">
            <table id="table" class="display responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Nama Barang</th>
                        <th>Berat</th>
                        <th>Gambar</th>
                        <th>Jumlah Pesanan</th>
                        <th>Total Harga</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($purchase as $no => $product)
                        <tr>
                            <td class="text-center">{{ ++$no }}</td>
                            <td>{{ $product->thing->name }}</td>
                            <td>{{ $product->thing->weigth }}gr</td>
                            <td><img src="{{ Storage::url($product->thing->image) }}"
                                    style="object-fit: cover;
                              object-position: center; width: 150px; height:150px;"
                                    alt="{{ $product->thing->name }}">
                            </td>
                            <td>{{ $product->quantity }}</td>
                            <td>{{ $product->total }}</td>
                            <td>
                            @if ($product->status == 'Pesanan Telah Sampai')
                           <button class="btn btn-success">Telah di selesai</button>
                            @else
                            <button class="btn btn-sm btn-primary">{{ $product->status }}</button>
                            <p></p>
                            <form action="{{ route('supplier.end', $product->id) }}" method="post">
                                @csrf
                                @method('put')
                                <button
                                    type="submit"
                                    class="btn btn-info m-4 btn-sm"
                                >
                                    Telah Di terima
                                </button>
                            @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-apps>
