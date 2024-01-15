<x-apps>
    <x-slot name="title">
        Data Pelanggan
    </x-slot>
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800 font-weight-bold">DATA PELANGGAN</h1>
        @if (session('success'))
            <div class="alert alert-primary shadow" role="alert">
                {{ session('success') }}
            </div>
        @elseif ($errors->any())
            <div class="alert alert-danger shadow" role="alert">
                Ada yang salah dengan inputan anda, silahkan input ulang.
            </div>
        @endif
        @include('admin.supplier.tambah')
    </div>

    <div class="card shadow m-3">
        <div class="card-body">
            <table id="mytable" class="display responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Pelaggan</th>
                        <th>alamat</th>
                        <th>No Telphone</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($supplier as $no => $sp)
                        <tr>
                            <td class="text-center">{{ ++$no }} </td>
                            <td>{{ $sp->name }}</td>
                            <td>{{ $sp->address }}</td>
                            <td>{{ $sp->no_telp }}</td>
                            <td class="text-center">
                                <div class="d-flex" style="gap: 5px">
                                    <a href="/supplier/{{ $sp->id }}/edit" class="btn btn-warning"><i
                                            class="fa fa-gavel" aria-hidden="true"></i> Ubah</a>
                                    <form action="/supplier/{{ $sp->id }}" method="POST">
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
