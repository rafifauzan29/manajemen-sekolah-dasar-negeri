<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Manajemen Sekolah')</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 min-h-screen font-sans">

    <div x-data="{ sidebarOpen: false }" class="flex h-screen">

        <!-- Sidebar -->
        <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
            class="fixed inset-y-0 left-0 z-40 w-64 {{ $theme['bg_nav'] }} border-r border-gray-200 shadow-lg transform transition-transform duration-300 ease-in-out -translate-x-full lg:static lg:translate-x-0 flex flex-col px-5 py-6 {{ $theme['sidebar_text'] }}">
            <div class="flex items-center gap-3 mb-8">
                <img src="{{ $pengaturan->logo ? asset('storage/' . $pengaturan->logo) : asset('images/logo.png') }}"
                    alt="Logo" class="h-12 w-auto" />
                <h1 class="text-lg font-bold leading-tight">{{ $pengaturan->nama_sekolah ?? 'Manajemen Sekolah' }}</h1>
            </div>

            <nav class="flex flex-col space-y-2 text-sm font-medium">
                <a href="{{ route('dashboard') }}"
                    class="flex items-center gap-2 px-3 py-2 rounded-lg transition
                    {{ isActiveRoute(['dashboard', 'dashboard.*'], $theme['light'] . ' ' . $theme['text'] . ' font-semibold') }}
                        stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7m-9 2v8m4-8h5a2 2 0 012 2v8" />
                    </svg>
                    Dashboard
                </a>

                @auth
                    @if (Auth::user()->hasRole('admin'))
                        <span class="mt-4 mb-1 uppercase font-semibold text-xs text-gray-400">Admin Menu</span>

                        <a href="{{ route('guru.index') }}"
                            class="flex items-center gap-2 px-3 py-2 rounded-lg transition
                        {{ isActiveRoute(['guru.index', 'guru.*'], $theme['light'] . ' ' . $theme['text'] . ' font-semibold') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5.121 17.804A6 6 0 1118.88 6.197M15 11a3 3 0 110-6 3 3 0 010 6z" />
                            </svg>
                            Kelola Guru
                        </a>

                        <a href="{{ route('kelas.index') }}"
                            class="flex items-center gap-2 px-3 py-2 rounded-lg transition
                        {{ isActiveRoute(['kelas.index', 'kelas.*'], $theme['light'] . ' ' . $theme['text'] . ' font-semibold') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 7h18M3 12h18M3 17h18" />
                            </svg>
                            Kelola Kelas
                        </a>

                        <a href="{{ route('siswa.index') }}"
                            class="flex items-center gap-2 px-3 py-2 rounded-lg transition
                        {{ isActiveRoute(['siswa.index', 'siswa.*'], $theme['light'] . ' ' . $theme['text'] . ' font-semibold') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 14l9-5-9-5-9 5 9 5z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 14l6.16-3.422A12.083 12.083 0 0118 20.944M12 14l-6.16-3.422A12.083 12.083 0 006 20.944" />
                            </svg>
                            Kelola Siswa
                        </a>

                        <a href="{{ route('mapel.index') }}"
                            class="flex items-center gap-2 px-3 py-2 rounded-lg transition
                        {{ isActiveRoute(['mapel.index', 'mapel.*'], $theme['light'] . ' ' . $theme['text'] . ' font-semibold') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Kelola Mapel
                        </a>

                        <a href="{{ route('jadwal.index') }}"
                            class="flex items-center gap-2 px-3 py-2 rounded-lg transition
                        {{ isActiveRoute(['jadwal.index', 'jadwal.*'], $theme['light'] . ' ' . $theme['text'] . ' font-semibold') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10m-12 4h14a2 2 0 002-2V7a2 2 0 00-2-2h-14a2 2 0 00-2 2v6a2 2 0 002 2z" />
                            </svg>
                            Kelola Jadwal
                        </a>

                        <a href="{{ route('pengaturan.index') }}"
                            class="flex items-center gap-2 px-3 py-2 rounded-lg transition
                        {{ isActiveRoute(['pengaturan.index', 'pengaturan.*'], $theme['light'].' '.$theme['text'].' font-semibold') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 11V9a4 4 0 118 0v2m-2 10a2 2 0 002-2v-6H9v6a2 2 0 002 2h6z" />
                            </svg>
                            Pengaturan
                        </a>
                    @endif

                    @if (Auth::user()->hasRole('guru'))
                        <span class="mt-6 mb-1 uppercase font-semibold text-xs text-gray-400">Guru Menu</span>
                        <span class="block px-3 py-2 text-gray-400 cursor-not-allowed">Absensi</span>
                        <span class="block px-3 py-2 text-gray-400 cursor-not-allowed">Input Nilai</span>
                        <span class="block px-3 py-2 text-gray-400 cursor-not-allowed">Raport</span>
                        <span class="block px-3 py-2 text-gray-400 cursor-not-allowed">Jadwal Mengajar</span>
                    @endif

                    <form method="POST" action="{{ route('logout') }}" class="mt-auto">
                        @csrf
                        <button type="submit"
                            class="w-full flex items-center justify-center gap-2 px-3 py-2 mt-6
                            bg-red-600 text-white rounded-lg hover:bg-red-700 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1m0-5V8" />
                            </svg>
                            Logout
                        </button>
                    </form>
                @else
                    <p class="text-sm text-red-500 mt-4">Silakan login untuk melihat menu.</p>
                @endauth
            </nav>
        </aside>

        <!-- Overlay Mobile -->
        <div x-show="sidebarOpen" x-transition.opacity class="fixed inset-0 z-30 lg:hidden"
            style="background-color: rgba(0,0,0,0.50);" @click="sidebarOpen = false">
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">

            <!-- Navbar -->
            <header
                class="flex items-center justify-between {{ $theme['bg_nav'] }} border-b border-gray-200 px-4 py-3 shadow-sm {{ $theme['sidebar_text'] }}">
                <div class="flex items-center gap-3">
                    <button @click="sidebarOpen = !sidebarOpen" class="lg:hidden hover:opacity-80 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                    <h2 class="text-xl font-semibold">@yield('header', 'Dashboard')</h2>
                </div>
                <div class="text-sm">{{ Auth::user()->name ?? 'Guest' }}</div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 p-6 overflow-y-auto">
                @yield('content')
            </main>

            <!-- Footer -->
            <footer class="bg-white border-t border-gray-200 text-center p-4 text-gray-500 text-sm">
                &copy; {{ date('Y') }} {{ $pengaturan->nama_sekolah ?? 'Manajemen Sekolah' }}. All rights
                reserved.
            </footer>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        @if (session('success'))
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true
            });
        @endif

        @if (session('error'))
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'error',
                title: '{{ session('error') }}',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true
            });
        @endif
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.btn-delete').forEach(function(button) {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    let form = this.closest('form');

                    Swal.fire({
                        title: 'Yakin ingin menghapus?',
                        text: "Data yang dihapus tidak bisa dikembalikan!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
</body>

</html>
