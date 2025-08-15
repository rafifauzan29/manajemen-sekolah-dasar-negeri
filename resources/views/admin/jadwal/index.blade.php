@extends('layouts.app')

@section('title', 'Kelola Jadwal')
@section('header', 'Kelola Jadwal Pelajaran')

@section('content')
    <div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <h2 class="text-2xl font-bold text-gray-800">📅 Daftar Jadwal</h2>
        <a href="{{ route('jadwal.create') }}"
            class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-5 py-2.5 rounded-lg shadow-lg hover:shadow-xl hover:from-blue-700 hover:to-indigo-700 transition-all w-full sm:w-auto justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Tambah Jadwal
        </a>
    </div>

    {{-- Desktop & Tablet --}}
    <div class="hidden md:block overflow-x-auto bg-white rounded-xl shadow-lg border border-gray-100">
        <table class="w-full text-sm text-gray-700">
            <thead>
                <tr class="bg-gradient-to-r from-blue-50 to-indigo-50">
                    <th class="px-6 py-3 text-left font-semibold">Kelas</th>
                    <th class="px-6 py-3 text-left font-semibold">Mata Pelajaran</th>
                    <th class="px-6 py-3 text-left font-semibold">Guru</th>
                    <th class="px-6 py-3 text-left font-semibold">Hari</th>
                    <th class="px-6 py-3 text-left font-semibold">Jam</th>
                    <th class="px-6 py-3 text-center font-semibold">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($jadwal as $item)
                    <tr class="border-b border-gray-100 hover:bg-blue-50/50 transition-all duration-200">
                        <td class="px-6 py-4 font-medium text-gray-900">{{ $item->kelas->nama_kelas }}</td>
                        <td class="px-6 py-4">{{ $item->mapel->nama_mapel ?? '-' }}</td>
                        <td class="px-6 py-4">{{ $item->guru->name ?? $item->kelas->waliKelas->name }}</td>
                        <td class="px-6 py-4">{{ ucfirst($item->hari) }}</td>
                        <td class="px-6 py-4">
                            {{ \Carbon\Carbon::parse($item->jam_mulai)->format('H.i') }} -
                            {{ \Carbon\Carbon::parse($item->jam_selesai)->format('H.i') }}
                        </td>
                        <td class="px-6 py-4 flex items-center justify-center gap-3">
                            <a href="{{ route('jadwal.edit', $item->id) }}"
                                class="inline-flex items-center px-3 py-1.5 bg-blue-50 text-blue-600 hover:bg-blue-100 rounded-lg text-xs font-medium transition">
                                ✏️ Edit
                            </a>
                            <form action="{{ route('jadwal.destroy', $item->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="btn-delete inline-flex items-center px-3 py-1.5 bg-red-50 text-red-600 hover:bg-red-100 rounded-lg text-xs font-medium transition">
                                    🗑️ Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center text-gray-500">Belum ada data jadwal</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="hidden md:flex justify-center mt-6">
        {{ $jadwal->links('vendor.pagination.tailwind') }}
    </div>

    {{-- Mobile --}}
    <div class="space-y-4 md:hidden">
        @forelse($jadwal as $item)
            <div class="bg-white p-4 rounded-xl shadow-md border border-gray-100 hover:shadow-lg transition-all">
                <div class="flex flex-col gap-1">
                    <p class="text-gray-900 font-semibold">{{ $item->kelas->nama_kelas }} - {{ ucfirst($item->hari) }}</p>
                    <p class="text-gray-600 text-sm">{{ $item->mapel->nama_mapel ?? '-' }}</p>
                    <p class="text-gray-600 text-sm">
                        Guru: {{ $item->guru->name ?? $item->kelas->waliKelas->name }}
                    </p>
                    <p class="text-gray-600 text-sm">
                        Jam: {{ \Carbon\Carbon::parse($item->jam_mulai)->format('H.i') }} -
                        {{ \Carbon\Carbon::parse($item->jam_selesai)->format('H.i') }}
                    </p>
                </div>
                <div class="mt-3 flex items-center gap-3">
                    <a href="{{ route('jadwal.edit', $item->id) }}"
                        class="flex-1 inline-flex justify-center items-center bg-blue-50 text-blue-600 hover:bg-blue-100 px-3 py-1.5 rounded-lg text-sm font-medium transition">
                        ✏️ Edit
                    </a>
                    <form action="{{ route('jadwal.destroy', $item->id) }}" method="POST" class="flex-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="btn-delete w-full inline-flex justify-center items-center bg-red-50 text-red-600 hover:bg-red-100 px-3 py-1.5 rounded-lg text-sm font-medium transition">
                            🗑️ Hapus
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <p class="text-center text-gray-500">Belum ada data jadwal</p>
        @endforelse
    </div>

    <div class="flex justify-center mt-6 md:hidden gap-1">
        @if ($jadwal->onFirstPage())
            <span class="px-3 py-1 bg-gray-100 text-gray-400 rounded">Prev</span>
        @else
            <a href="{{ $jadwal->previousPageUrl() }}" class="px-3 py-1 bg-blue-600 text-white rounded">Prev</a>
        @endif

        @php
            $start = max($jadwal->currentPage(), 1);
            $end = min($start + 1, $jadwal->lastPage());
        @endphp

        @for ($i = $start; $i <= $end; $i++)
            @if ($i == $jadwal->currentPage())
                <span class="px-3 py-1 bg-blue-600 text-white rounded">{{ $i }}</span>
            @else
                <a href="{{ $jadwal->url($i) }}"
                    class="px-3 py-1 bg-blue-50 text-blue-600 rounded">{{ $i }}</a>
            @endif
        @endfor

        @if ($end < $jadwal->lastPage() - 1)
            <span class="px-2 py-1">…</span>
        @endif

        @if ($end < $jadwal->lastPage())
            <a href="{{ $jadwal->url($jadwal->lastPage()) }}"
                class="px-3 py-1 bg-blue-50 text-blue-600 rounded">{{ $jadwal->lastPage() }}</a>
        @endif

        @if ($jadwal->hasMorePages())
            <a href="{{ $jadwal->nextPageUrl() }}" class="px-3 py-1 bg-blue-600 text-white rounded ml-1">Next</a>
        @else
            <span class="px-3 py-1 bg-gray-100 text-gray-400 rounded ml-1">Next</span>
        @endif
    </div>
@endsection
