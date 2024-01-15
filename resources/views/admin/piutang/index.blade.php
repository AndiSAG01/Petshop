<x-apps>
    <x-slot name="title">
        Data Piutang
    </x-slot>
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800 font-weight-bold">DATA PIUTANG</h1>
        @if (session('success'))
            <div class="alert alert-primary shadow" role="alert">
                {{ session('success') }}
            </div>
        @elseif ($errors->any())
            <div class="alert alert-danger shadow" role="alert">
                Ada yang salah dengan inputan anda, silahkan input ulang.
            </div>
        @endif
        @include('admin.piutang.tambah')
    </div>

    <div class="card shadow m-3">
        <div class="card-body">
            <table id="mytable" class="display responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Pelanggan</th>
                        <th>Nama Barang</th>
                        <th>Jumlah Barang</th>
                        <th>Harga Satuan</th>
                        <th>Jumalh Total Harga</th>
                        <th>status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($receivable as $no => $pt)
                        <tr>
                            <td class="text-center">{{ ++$no }} </td>
                            <td>{{ $pt->supplier->name }}</td>
                            <td>{{ $pt->name_item }}</td>
                            <td>{{ $pt->quantity }}</td>
                            <td>{{ $pt->price }}</td>
                            <td>
                              {{ $pt->total }}
                            </td>
                            <td>
                                {{-- @if ($total == 0)
                                    <a href="" class="btn btn-success btn-block">Lunas</a>
                                @else
                                    <a href="" class="btn btn-danger btn-block">Belum Lunas</a>
                                @endif --}}asdaadsa
                            </td>
                            <td class="text-center">
                                <div class="d-flex" style="gap: 5px">
                                    <a href="/receivable/{{ $pt->id }}/edit" class="btn btn-warning"><i
                                            class="fa fa-gavel" aria-hidden="true"></i> Ubah</a>
                                    <form action="/receivable/{{ $pt->id }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button onclick="return confirm('Yakin ingin menghapus data?')"
                                            class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-apps>
