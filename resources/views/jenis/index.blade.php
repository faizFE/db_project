<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-black leading-tight">
            {{ __('Jenis') }}
        </h2>
    </x-slot>

    <x-secondary-button><a href="{{ route('jenis.create') }}">Tambah</a></x-secondary-button>
    <x-table>
        <x-slot name="tableHeader">
            <tr>
                <th>No</th>
                <th>Nama Jenis</th>
                <th>Aksi</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($jenis as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama_jenis }}</td>
                <td>
                    <x-page href="{{route('jenis.show', $item->id_jenis)}}">Detail</x-page>
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
