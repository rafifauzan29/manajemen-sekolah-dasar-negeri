<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Manajemen Sekolah')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

    <div class="flex flex-1">

        <aside class="w-64 bg-white border-r border-gray-200 min-h-screen px-4 py-6 flex flex-col">
            <h1 class="text-xl font-bold mb-8">Manajemen Sekolah</h1>

            <nav class="flex flex-col space-y-3 text-gray-700">

                <a href="{{ route('dashboard') }}"
                    class="px-3 py-2 rounded hover:bg-gray-200 bg-gray-300 font-semibold cursor-pointer">
                    Dashboard
                </a>

                @auth
                    @if(Auth::user()->hasRole('admin'))
                        <span class="mt-4 mb-2 uppercase font-semibold text-xs text-gray-500">Admin Menu</span>

                        <a href="#" class="px-3 py-2 rounded text-gray-400 cursor-not-allowed select-none" aria-disabled="true" tabindex="-1">Guru</a>
                        <a href="#" class="px-3 py-2 rounded text-gray-400 cursor-not-allowed select-none" aria-disabled="true" tabindex="-1">Siswa</a>
                        <a href="#" class="px-3 py-2 rounded text-gray-400 cursor-not-allowed select-none" aria-disabled="true" tabindex="-1">Kelas</a>
                        <a href="#" class="px-3 py-2 rounded text-gray-400 cursor-not-allowed select-none" aria-disabled="true" tabindex="-1">Mapel</a>
                        <a href="#" class="px-3 py-2 rounded text-gray-400 cursor-not-allowed select-none" aria-disabled="true" tabindex="-1">Jadwal</a>
                    @endif

                    @if(Auth::user()->hasRole('guru'))
                        <span class="mt-6 mb-2 uppercase font-semibold text-xs text-gray-500">Guru Menu</span>

                        <a href="#" class="px-3 py-2 rounded text-gray-400 cursor-not-allowed select-none" aria-disabled="true" tabindex="-1">Absensi</a>
                        <a href="#" class="px-3 py-2 rounded text-gray-400 cursor-not-allowed select-none" aria-disabled="true" tabindex="-1">Input Nilai</a>
                        <a href="#" class="px-3 py-2 rounded text-gray-400 cursor-not-allowed select-none" aria-disabled="true" tabindex="-1">Raport</a>
                        <a href="#" class="px-3 py-2 rounded text-gray-400 cursor-not-allowed select-none" aria-disabled="true" tabindex="-1">Jadwal Mengajar</a>
                    @endif

                    @if(!Auth::user()->hasRole('admin') && !Auth::user()->hasRole('guru'))
                        <p class="text-sm text-red-500 mt-4">Role belum diassign</p>
                    @endif

                    <!-- Logout button -->
                    <form method="POST" action="{{ route('logout') }}" class="mt-auto">
                        @csrf
                        <button type="submit"
                            class="w-full px-3 py-2 mt-6 bg-red-600 text-white rounded hover:bg-red-700 transition">
                            Logout
                        </button>
                    </form>

                @else
                    <p class="text-sm text-red-500 mt-4">Silakan login untuk melihat menu.</p>
                @endauth

            </nav>
        </aside>

        <main class="flex-1 p-6">
            <header class="mb-6">
                <h2 class="text-2xl font-semibold">@yield('header', 'Dashboard')</h2>
            </header>

            <section>
                @yield('content')
            </section>
        </main>

    </div>

    <footer class="bg-white border-t border-gray-200 text-center p-4 text-gray-500 text-sm">
        &copy; {{ date('Y') }} Manajemen Sekolah. All rights reserved.
    </footer>

</body>
</html>
