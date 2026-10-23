<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-black leading-tight">
            {{ __('Tambah Jenis') }}
        </h2>
    </x-slot>

    <x-form action="{{route('jenis.store')}}" method="POST">
        <x-input-label for="jenis">Nama jenis</x-input-label>
        <x-text-input type="text" id="jenis" name="nama_jenis" placeholder="Masukkan Nama jenis" required/>
        <x-primary-button>Tambah</x-primary-button>
    </x-form>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('error'))
        <script>
            Swal.fire({
                icon: "error",
                title: "{{ session('error') }}",
            });
        </script>
    @endif
</x-app-layout>