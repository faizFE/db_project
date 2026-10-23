<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-black leading-tight">
            {{ __('Tambah Penyesuaian') }}
        </h2>
    </x-slot>

    <x-form action="{{ route('penyesuaian.store') }}" method="POST">
        <x-input-label for="nama_barang">Nama barang</x-input-label>
          <x-select-input id="nama_barang" name="barang_id">
            <option value="">--Pilih Nama barang</option>
            @foreach ($barang as $item)
                <option value="{{ $item->id_barang }}" required>{{ $item->id_barang }} - {{ $item->nama_barang }}
                </option>
            @endforeach
        </x-select-input>
        <x-input-label>Penyesuaian</x-input-label>
        <x-radio-input name="penyesuaian" value="penambahan">
            Penambahan
       </x-radio-input>
       <x-radio-input name="penyesuaian" value="pengurangan">
            pengurangan
       </x-radio-input>
        <x-input-label for="stok_penyesuaian">Stok Penyesuaian</x-input-label>
        <x-text-input id="stok_penyesuaian" name="stok_penyesuaian" placeholder="Masukkan Stok Barang" type="number" required />
        <x-input-label for="tanggal_penyesuaian">Tanggal penyesuaian</x-input-label>
        <x-text-input type="datetime-local" id="tanggal_penyesuaian" name="tanggal_penyesuaian" required />
        <x-input-label for="alasan">Alasan</x-input-label>
        <x-textarea id="alasan" name="alasan"></x-textarea>
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
