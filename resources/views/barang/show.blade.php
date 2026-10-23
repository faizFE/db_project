<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-black leading-tight">
            {{ __('Barang') }}
        </h2>
    </x-slot>

    <div class="inline-flex items-center justify-end gap-2 mb-2 w-full">
        @if (auth()->user()->role == 'admin')
            <x-page href="{{ route('barang.edit', $barang->id_barang) }}">Edit</x-page>
            <form action="{{ route('barang.delete', $barang->id_barang) }}" method="POST" class="delete-form">
                @csrf
                @method('DELETE')

                <x-danger-button type="submit">Hapus</x-danger-button>
            </form>
        @endif
    </div>
    <x-table-show>
        <x-table-show-row label="ID">
            {{ $barang->id_barang }}
        </x-table-show-row>
        <x-table-show-row label="Nama Barang">
            {{ $barang->nama_barang }}
        </x-table-show-row>
        <x-table-show-row label="Kategori">
            {{ $barang->kategori }}
        </x-table-show-row>
        <x-table-show-row label="Jenis">
            {{ $barang->jenis->nama_jenis }}
        </x-table-show-row>
        <x-table-show-row label="Stok">
            {{ $barang->stok }}
        </x-table-show-row>
    </x-table-show>
    <h1 class="mt-6 font-bold">Riwayat Transaksi</h1>
    <x-table>
        <x-slot name="tableHeader">
            <tr>
                <th>Nama Transaksi</th>
                <th>Waktu Transaksi</th>
                <th>Stok</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($riwayat as $item)
                <tr>
                    <td>{{ $item->jenis_transaksi }}</td>
                    <td>{{ $item->waktu_transaksi }}</td>
                    <td>{{ $item->stok_transaksi }}</td>
                </tr>
            @endforeach
        </x-slot>
    </x-table>
</x-app-layout>
