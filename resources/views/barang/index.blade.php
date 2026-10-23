<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-black leading-tight">
            {{ __('Barang') }}
        </h2>
    </x-slot>

    <x-page href="{{ route('barang.create') }}" class="tambah">Tambah</x-page>
    <x-table>
        <x-slot name="tableHeader">
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Jenis</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($barang as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_barang }}</td>
                    <td>{{ $item->jenis->nama_jenis }}</td>
                    <td>{{ $item->stok }}</td>
                    <td>
                        <div class="inline-flex items-center justify-center gap-2 w-full">
                            <x-page href="{{ route('barang.show', $item->id_barang) }}">Detail</x-page>
                        </div>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-table>
    {{ $barang->links() }}
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
