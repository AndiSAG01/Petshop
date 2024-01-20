<x-apps>
    <x-slot name="title">Data Pemesanan</x-slot>

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
                                @if ($product->status == 'menunggu konfirmasi')
                                <form action="{{ route('supplier.confirm', $product->id) }}" method="post">
                                 @csrf
                                 @method('put')
                                 <button
                                     type="submit"
                                     class="btn btn-info"
                                 >
                                     Konfirmasi
                                 </button>
                                 @else
                                 <a href="" class="btn btn-success">Selesai</a>
                                @endif
                                
                            </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-apps>
