<x-app-layout>
     <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-black leading-tight">
            {{ __('Detail Penyesuaian') }}
        </h2>
    </x-slot>

    <x-table-show>
        <x-table-show-row label="ID">
            {{$penyesuaian->id_penyesuaian}}
        </x-table-show-row>
        <x-table-show-row label="Nama Barang">
            {{$penyesuaian->barang->nama_barang}}
        </x-table-show-row>
        <x-table-show-row label="Penyesuaian">
            {{$penyesuaian->penyesuaian}}
        </x-table-show-row>
        <x-table-show-row label="Stok Penyesuaian">
            @if ($penyesuaian->penyesuaian == 'penambahan')
                +{{$penyesuaian->stok_penyesuaian}}
            @else
                -{{$penyesuaian->stok_penyesuaian}}
            @endif
        </x-table-show-row>
        <x-table-show-row label="Tanggal Penyesuaian">
            {{$penyesuaian->tanggal_penyesuaian}}
        </x-table-show-row>
        <x-table-show-row label="Penanggung Jawab">
            {{$penyesuaian->user->name}}
        </x-table-show-row>
        <x-table-show-row label="Alasan">
            {{$penyesuaian->alasan}}
        </x-table-show-row>
    </x-table-show>
</x-app-layout>