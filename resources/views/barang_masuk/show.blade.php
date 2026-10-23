<x-app-layout>
     <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-black leading-tight">
            {{ __('Barang Masuk') }}
        </h2>
    </x-slot>

    <x-table-show>
        <x-table-show-row label="ID">
            {{$barangMasuk->id_barang_masuk}}
        </x-table-show-row>
        <x-table-show-row label="Nama Barang">
            {{$barangMasuk->barang->nama_barang}}
        </x-table-show-row>
        <x-table-show-row label="Stok Masuk">
            {{$barangMasuk->stok_masuk}}
        </x-table-show-row>
        <x-table-show-row label="Tanggal Masuk">
            {{$barangMasuk->tanggal_masuk}}
        </x-table-show-row>
        <x-table-show-row label="Penanggung Jawab">
            {{$barangMasuk->user->name}}
        </x-table-show-row>
        <x-table-show-row label="Keterangan">
            {{$barangMasuk->keterangan}}
        </x-table-show-row>
    </x-table-show>
</x-app-layout>