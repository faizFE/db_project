<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-black leading-tight">
            {{ __('Jenis') }}
        </h2>
    </x-slot>

    <div class="inline-flex items-center justify-end gap-2 w-full mb-3">
        @if (auth()->user()->role == 'admin')
            <x-page href="{{ route('jenis.edit', $jenis->id_jenis) }}">Edit</x-page>
            <form action="{{ route('jenis.delete', $jenis->id_jenis) }}" method="POST" class="delete-form">
                @csrf
                @method('DELETE')

                <x-danger-button type="submit">Hapus</x-danger-button>
            </form>
        @endif
    </div>
    <x-table-show>
        <x-table-show-row label="ID Jenis">
            {{ $jenis->id_jenis }}
        </x-table-show-row>
        <x-table-show-row label="Nama Jenis">
            {{ $jenis->nama_jenis }}
        </x-table-show-row>
    </x-table-show>
</x-app-layout>
