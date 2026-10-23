<aside class="flex min-h-screen w-64 shrink-0 flex-col bg-[#C4E2F5] text-white">

    <div class="flex h-20 items-center border-b border-black/10 px-6">
        <div>
            <!-- Mengganti text menjadi gambar logo -->
            <img src="{{ asset('images/logo-sultan_agung.png') }}" alt="Logo Web" class="h-10 w-auto object-contain ml-5">
        </div>
    </div>


    <nav class="flex-1 py-6">
        <a href="{{ route('dashboard') }}"
            class="flex w-full items-center px-6 py-5 text-sm font-medium transition {{ request()->routeIs('dashboard') ? 'bg-[#4BB8FA] text-white' : 'text-black hover:bg-[#4BB8FA] hover:text-white' }}">Dashboard
        </a>
        <a href="{{ route('barang.index') }}"
            class="flex w-full items-center px-6 py-5 text-sm font-medium transition {{ request()->routeIs('barang.index') ? 'bg-[#4BB8FA] text-white' : 'text-black hover:bg-[#4BB8FA] hover:text-white' }}">Barang
        </a>
        <a href="{{ route('barang_masuk.index') }}"
            class="flex w-full items-center px-6 py-5 text-sm font-medium transition {{ request()->routeIs('barang_masuk.index') ? 'bg-[#4BB8FA] text-white' : 'text-black hover:bg-[#4BB8FA] hover:text-white' }}">Barang
            Masuk
        </a>
        <a href="{{ route('barang_keluar.index') }}"
            class="flex w-full items-center px-6 py-5 text-sm font-medium transition {{ request()->routeIs('barang_keluar.index') ? 'bg-[#4BB8FA] text-white' : 'text-black hover:bg-[#4BB8FA] hover:text-white' }}">Barang
            Keluar
        </a>
        <a href="{{ route('penyesuaian.index') }}"
            class="flex w-full items-center px-6 py-5 text-sm font-medium transition {{ request()->routeIs('penyesuaian.index') ? 'bg-[#4BB8FA] text-white' : 'text-black hover:bg-[#4BB8FA] hover:text-white' }}">Penyesuaian
        </a>
        <a href="{{ route('jenis.index') }}"
            class="flex w-full items-center px-6 py-5 text-sm font-medium transition {{ request()->routeIs('jenis.index') ? 'bg-[#4BB8FA] text-white' : 'text-black hover:bg-[#4BB8FA] hover:text-white' }}">Jenis
        </a>
        {{-- @if (auth()->user()->role == 'admin')
            <a href="{{ route('approvals.index') }}"
                class="flex w-full items-center px-6 py-5 text-sm font-medium transition {{ request()->routeIs('approvals.index') ? 'bg-[#4BB8FA] text-white' : 'text-black hover:bg-[#4BB8FA] hover:text-white' }}">persetujuan
            </a>
        @endif --}}
    </nav>
</aside>
