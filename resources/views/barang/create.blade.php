<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-black leading-tight">
            {{ __('Tambah Barang') }}
        </h2>
    </x-slot>

    <x-form action="{{ route('barang.store') }}" method="POST">
        <x-input-label for="barang">Nama Barang</x-input-label>
        <x-text-input type="text" id="barang" name="nama_barang" placeholder="Masukkan Nama Barang" required />
        <x-input-label for="jenis">Jenis</x-input-label>
        <x-select-input name="jenis_id" id="jenis">
            <option value="">--Pilih Jenis barang--</option>
            @foreach ($jenis as $item)
                <option value="{{ $item->id_jenis }}">{{ $item->nama_jenis }}</option>
            @endforeach
        </x-select-input>
        <x-radio-input name="kategori" value="Barang Habis Pakai">
            Barang Habis Pakai
        </x-radio-input>
        <x-radio-input name="kategori" value="Barang Tidak Habis Pakai">
            Barang Tidak Habis Pakai
        </x-radio-input>
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
