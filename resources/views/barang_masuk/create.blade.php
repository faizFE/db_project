<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-black leading-tight">
            {{ __('Tambah Stok Barang') }}
        </h2>
    </x-slot>

    <x-form action="{{ route('barang_masuk.store') }}" method="POST">
        <x-input-label for="nama_barang">Nama barang</x-input-label>
        <x-select-input id="nama_barang" name="barang_id">
            <option value="">--Pilih Nama barang</option>
            @foreach ($barang as $item)
                <option value="{{ $item->id_barang }}" required>{{ $item->id_barang }} - {{ $item->nama_barang }}
                </option>
            @endforeach
        </x-select-input>
        <x-input-label for="stok_masuk">Stok Masuk</x-input-label>
        <x-text-input id="stok_masuk" name="stok_masuk" placeholder="Masukkan Stok Barang" type="number" required />
        <x-input-label for="tanggal_masuk">Tanggal Masuk</x-input-label>
        <x-text-input type="datetime-local" id="tanggal_masuk" name="tanggal_masuk" required />
        <x-input-label for="keterangan">Keterangan</x-input-label>
        <x-textarea id="keterangan" name="keterangan"></x-textarea>
        <x-primary-button>Tambah</x-primary-button>
    </x-form>
</x-app-layout>
