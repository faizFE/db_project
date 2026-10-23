<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-black leading-tight">
            {{ __('Penyesuaian') }}
        </h2>
    </x-slot>

    <x-page href="{{ route('penyesuaian.create') }}">Tambah</x-page>
    <x-table>
        <x-slot name="tableHeader">
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Stok</th>
                <th>Tanggal Penyesuaian</th>
                <th>Aksi</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($penyesuaian as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->barang->nama_barang }}</td>
                    <td>
                        @if ($item->penyesuaian == 'penambahan')
                            +{{$item->stok_penyesuaian}}
                        @else
                            -{{$item->stok_penyesuaian}}
                        @endif
                    </td>
                    <td>{{ $item->tanggal_penyesuaian }}</td>
                    <td>
                        <x-page href="{{ route('penyesuaian.show', $item->id_penyesuaian) }}">Detail</x-page>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-table>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('success'))
        <script>
            Swal.fire({
                title: 'Berhasil',
                text: '{{ session('success') }}',
                icon: 'success'
            });
        </script>
    @endif
</x-app-layout>
