<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-black leading-tight">
            {{ __('Edit Barang') }}
        </h2>
    </x-slot>

    <x-form action="{{ route('barang.update', $barang->id_barang) }}" method="POST">
        @method('PUT')
        <x-input-label for="barang">Nama Barang</x-input-label>
        <x-text-input type="text" id="barang" name="nama_barang" placeholder="Masukkan Nama Barang"
            value="{{ $barang->nama_barang }}" required />
        <x-input-label for="jenis">Jenis</x-input-label>
        <x-select-input name="jenis_id" id="jenis">
            <option value="">-- Pilih Jenis Barang --</option>
            @foreach ($jenis as $item)
                <option value="{{ $item->id_jenis }}"
                    {{ old('jenis_id', $barang->jenis_id) == $item->id_jenis ? 'selected' : '' }}>
                    {{ $item->nama_jenis }}
                </option>
            @endforeach
        </x-select-input>
        <x-radio-input name="kategori" value="Barang Habis Pakai" :checked="old('kategori', $barang->kategori) == 'Barang Habis Pakai'">
            Barang Habis Pakai
        </x-radio-input>
        <x-radio-input name="kategori" value="Barang Tidak Habis Pakai" :checked="old('kategori', $barang->kategori) == 'Barang Tidak Habis Pakai'">
            Barang Tidak Habis Pakai
        </x-radio-input>
        <x-primary-button>Edit</x-primary-button>
    </x-form>
</x-app-layout>
