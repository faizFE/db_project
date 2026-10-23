<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-black leading-tight">
            {{ __('Edit Jenis') }}
        </h2>
    </x-slot>

    <x-form action="{{route('jenis.update', $jenis->id_jenis)}}" method="POST">
        @method('PUT')
        <x-input-label for="jenis">Nama jenis</x-input-label>
        <x-text-input type="text" id="jenis" name="nama_jenis" placeholder="Masukkan Nama jenis" value="{{$jenis->nama_jenis}}" required/>
        <x-primary-button>Edit</x-primary-button>
    </x-form>
</x-app-layout>