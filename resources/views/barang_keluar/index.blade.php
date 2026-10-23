<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-black leading-tight">
            {{ __('Barang Keluar') }}
        </h2>
    </x-slot>

    <x-page href="{{ route('barang_keluar.create') }}">Tambah</x-page>
    <x-table>
        <x-slot name="tableHeader">
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Stok Keluar</th>
                <th>Tanggal Keluar</th>
                <th>Aksi</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($barangKeluar as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->barang->nama_barang }}</td>
                    <td>{{ $item->stok_keluar }}</td>
                    <td>{{ $item->tanggal_keluar }}</td>
                    <td>
                        <x-page href="{{ route('barang_keluar.show', $item->id_barang_keluar) }}">Detail</x-page>
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
