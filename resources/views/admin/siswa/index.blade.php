@extends('layouts.app')

@section('title', 'Kelola Siswa')
@section('header', 'Kelola Siswa')

@section('content')
    <div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <h2 class="text-2xl font-bold text-gray-800">Daftar Siswa</h2>
        <a href="{{ route('siswa.create') }}"
            class="inline-flex items-center gap-2 bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700 transition w-full sm:w-auto justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Tambah Siswa
        </a>
    </div>

    {{-- Desktop & Tablet --}}
    <div class="hidden md:block overflow-x-auto bg-white rounded-lg shadow">
        <table class="w-full">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-200">
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Nama</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">NISN</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Kelas</th>
                    <th class="px-6 py-3 text-center text-sm font-semibold text-gray-600">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($siswas as $siswa)
                    <tr class="border-b hover:bg-gray-50 transition">
                        <td class="px-6 py-3 text-gray-800">{{ $siswa->nama }}</td>
                        <td class="px-6 py-3 text-gray-600">{{ $siswa->nisn }}</td>
                        <td class="px-6 py-3 text-gray-600">{{ $siswa->kelas->nama_kelas ?? '-' }}</td>
                        <td class="px-6 py-3 flex items-center justify-center gap-3">
                            <a href="{{ route('siswa.edit', $siswa->id) }}"
                                class="inline-flex items-center text-blue-600 hover:text-blue-800 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Edit
                            </a>
                            <form action="{{ route('siswa.destroy', $siswa->id) }}" method="POST"
                                class="inline-block delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="btn-delete inline-flex items-center text-red-600 hover:text-red-800 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                            Belum ada data siswa
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Mobile --}}
    <div class="space-y-4 md:hidden">
        @forelse($siswas as $siswa)
            <div class="bg-white p-4 rounded-lg shadow border border-gray-200">
                <div class="flex flex-col gap-1">
                    <p class="text-gray-800 font-semibold">{{ $siswa->nama }}</p>
                    <p class="text-gray-600 text-sm">NISN: {{ $siswa->nisn }}</p>
                    <p class="text-gray-600 text-sm">Kelas: {{ $siswa->kelas->nama_kelas ?? '-' }}</p>
                </div>
                <div class="mt-3 flex items-center gap-4">
                    <a href="{{ route('siswa.edit', $siswa->id) }}"
                        class="inline-flex items-center text-blue-600 hover:text-blue-800 transition text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Edit
                    </a>
                    <form action="{{ route('siswa.destroy', $siswa->id) }}" method="POST"
                        class="inline-block delete-form">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="btn-delete inline-flex items-center text-red-600 hover:text-red-800 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <p class="text-center text-gray-500">Belum ada data siswa</p>
        @endforelse
    </div>
@endsection
