{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Persetujuan Akun
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <x-table>
                <x-slot name="tableHeader">
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Tanggal Registrasi</th>
                        <th>Aksi</th>
                    </tr>
                </x-slot>
                <x-slot name="body">
                    @forelse ($approvals as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->user->username }}</td>
                            <td>{{ $item->user->email }}</td>
                            <td>{{ $item->created_at->format('d-m-y H:i') }}</td>
                            <td class="d-flex flex justify-center gap-3">
                                <form action="{{ route('approvals.approve', $item) }}" method="POST" class="approve-form">
                                    @csrf
                                    @method('PATCH')

                                    <x-secondary-button type="submit">Setujui</x-secondary-button>
                                </form>
                                <form action="{{ route('approvals.reject', $item) }}" method="POST" class="reject-form">
                                    @csrf
                                    @method('PATCH')

                                    <x-danger-button type="submit">Tolak</x-danger-button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td>Tidak ada akun yang menunggu persetujuan</td>
                        </tr>
                    @endforelse
                </x-slot>
            </x-table>
        </div>
    </div>
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
</x-app-layout> --}}
