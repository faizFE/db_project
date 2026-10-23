<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-black leading-tight">
            {{ __('Barang Masuk') }}
        </h2>
    </x-slot>

    <x-page href="{{route('barang_masuk.create')}}">Tambah</x-page>
    <x-table>
        <x-slot name="tableHeader">
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Stok Masuk</th>
                <th>Tanggal Masuk</th>
                <th>Aksi</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($barangMasuk as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->barang->nama_barang }}</td>
                <td>{{ $item->stok_masuk }}</td>
                <td>{{ $item->tanggal_masuk }}</td>
                <td>
                    <x-page href="{{route('barang_masuk.show', $item->id_barang_masuk)}}">Detail</x-page>
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