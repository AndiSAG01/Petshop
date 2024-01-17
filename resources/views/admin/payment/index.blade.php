<x-apps>
    <x-slot name="title">
        Data Pembayaran Hutang
    </x-slot>
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800 font-weight-bold">DATA PEMBAYARAN HUTANG</h1>
        @if (session('success'))
            <div class="alert alert-primary shadow" role="alert">
                {{ session('success') }}
            </div>
        @elseif ($errors->any())
            <div class="alert alert-danger shadow" role="alert">
                Ada yang salah dengan inputan anda, silahkan input ulang.
            </div>
        @endif
        @if (Auth()->user()->role == 'admin')
            @include('admin.payment.tambah')
        @endif
    </div>
    <div class="card shadow m-3">
        <div class="card-body">
            <table id="mytable" class="display responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Tanggal</th>
                        <th>Nama Supplier</th>
                        <th>Nama Item Dan Piutang</th>
                        <th>Bukti TF</th>
                        <th>pembayaran</th>
                        <th>Sisa</th>
                        <th>status</th>
                        @if (Auth()->user()->role == 'admin')
                            <th>Aksi</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($payment as $no => $py)
                        <tr>
                            <td class="text-center">{{ ++$no }} </td>
                            <td>{{ $py->date }}</td>
                            <td>{{ $py->sp->name }}</td>
                            <td>{{ $py->receivable->name_item }} @currency($py->receivable->total)</td>
                            <td>
                                <img src="{{ Storage::url($py->image) }}"
                                    style="object-fit: cover; object-position: center; width: 200px; height: 200px;"
                                    alt="">
                            </td>
                            <td> @currency($py->pay) </td>
                            <td>
                                @php
                                    $sisa = $py->receivable->total - $py->pay;
                                @endphp
                                @currency($sisa)
                            </td>
                            <td>
                                @if ($sisa == 0)
                                    <a href="" class="btn btn-success">LUNAS</a>
                                @else
                                    <a href="" class="btn btn-danger">BELUM LUNAS</a>
                                @endif
                            </td>
                            @if (Auth()->user()->role == 'admin')
                                <td class="text-center">
                                    <div class="d-flex" style="gap: 5px">
                                        <a href="/payment/{{ $py->id }}/edit" class="btn btn-warning"><i
                                                class="fa fa-gavel" aria-hidden="true"></i> Ubah</a>
                                        <form action="/payment/{{ $py->id }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button onclick="return confirm('Yakin ingin menghapus data?')"
                                                class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-apps>
