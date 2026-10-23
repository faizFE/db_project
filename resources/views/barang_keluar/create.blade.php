<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-black leading-tight">
            {{ __('Kurang Stok Barang') }}
        </h2>
    </x-slot>

    <x-form action="{{ route('barang_keluar.store') }}" method="POST">
        <x-input-label for="nama_barang">Nama barang</x-input-label>
        <x-select-input id="nama_barang" name="barang_id">
            <option value="">--Pilih Nama barang</option>
            @foreach ($barang as $item)
                <option value="{{ $item->id_barang }}" required>{{ $item->id_barang }} - {{ $item->nama_barang }}
                </option>
            @endforeach
        </x-select-input>
        <x-input-label for="stok_keluar">Stok Keluar</x-input-label>
        <x-text-input id="stok_keluar" name="stok_keluar" placeholder="Masukkan Stok Keluar" type="number" required />
        <x-input-label for="tanggal_keluar">Tanggal Keluar</x-input-label>
        <x-text-input type="datetime-local" id="tanggal_keluar" name="tanggal_keluar" required />
        <x-input-label for="keterangan">Keterangan</x-input-label>
        <x-textarea id="keterangan" name="keterangan"></x-textarea>
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
