@extends('layouts.app')

@section('title', 'Kelola Mapel')
@section('header', 'Kelola Mata Pelajaran')

@section('content')
    <div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <h2 class="text-2xl font-bold text-gray-800">📚 Daftar Mata Pelajaran</h2>
        <a href="{{ route('mapel.create') }}"
            class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-5 py-2.5 rounded-lg shadow-lg hover:shadow-xl hover:from-blue-700 hover:to-indigo-700 transition-all w-full sm:w-auto justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Tambah Mapel
        </a>
    </div>

    {{-- Desktop & Tablet --}}
    <div class="hidden md:block overflow-x-auto bg-white rounded-xl shadow-lg border border-gray-100">
        <table class="w-full text-sm text-gray-700">
            <thead>
                <tr class="bg-gradient-to-r from-blue-50 to-indigo-50">
                    <th class="px-6 py-3 text-left font-semibold">Nama Mapel</th>
                    <th class="px-6 py-3 text-center font-semibold">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($mapels as $mapel)
                    <tr class="border-b border-gray-100 hover:bg-blue-50/50 transition-all duration-200">
                        <td class="px-6 py-4 font-medium text-gray-900">{{ $mapel->nama_mapel }}</td>
                        <td class="px-6 py-4 flex items-center justify-center gap-3">
                            <a href="{{ route('mapel.edit', $mapel->id) }}"
                                class="inline-flex items-center px-3 py-1.5 bg-blue-50 text-blue-600 hover:bg-blue-100 rounded-lg text-xs font-medium transition">
                                ✏️ Edit
                            </a>
                            <form action="{{ route('mapel.destroy', $mapel->id) }}" method="POST" class="inline-block">
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
                        <td colspan="2" class="px-6 py-4 text-center text-gray-500">
                            Belum ada data mata pelajaran
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="hidden md:flex justify-center mt-6">
        {{ $mapels->links('vendor.pagination.tailwind') }}
    </div>

    {{-- Mobile --}}
    <div class="space-y-4 md:hidden">
        @forelse($mapels as $mapel)
            <div class="bg-white p-4 rounded-xl shadow-md border border-gray-100 hover:shadow-lg transition-all">
                <p class="text-gray-900 font-semibold">{{ $mapel->nama_mapel }}</p>
                <div class="mt-3 flex items-center gap-3">
                    <a href="{{ route('mapel.edit', $mapel->id) }}"
                        class="flex-1 inline-flex justify-center items-center bg-blue-50 text-blue-600 hover:bg-blue-100 px-3 py-1.5 rounded-lg text-sm font-medium transition">
                        ✏️ Edit
                    </a>
                    <form action="{{ route('mapel.destroy', $mapel->id) }}" method="POST" class="flex-1">
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
            <p class="text-center text-gray-500">Belum ada data mata pelajaran</p>
        @endforelse
    </div>

    <div class="flex justify-center mt-6 md:hidden gap-1">
        @if ($mapels->onFirstPage())
            <span class="px-3 py-1 bg-gray-100 text-gray-400 rounded">Prev</span>
        @else
            <a href="{{ $mapels->previousPageUrl() }}" class="px-3 py-1 bg-blue-600 text-white rounded">Prev</a>
        @endif

        @php
            $start = max($mapels->currentPage(), 1);
            $end = min($start + 1, $mapels->lastPage());
        @endphp

        @for ($i = $start; $i <= $end; $i++)
            @if ($i == $mapels->currentPage())
                <span class="px-3 py-1 bg-blue-600 text-white rounded">{{ $i }}</span>
            @else
                <a href="{{ $mapels->url($i) }}"
                    class="px-3 py-1 bg-blue-50 text-blue-600 rounded">{{ $i }}</a>
            @endif
        @endfor

        @if ($end < $mapels->lastPage() - 1)
            <span class="px-2 py-1">…</span>
        @endif

        @if ($end < $mapels->lastPage())
            <a href="{{ $mapels->url($mapels->lastPage()) }}"
                class="px-3 py-1 bg-blue-50 text-blue-600 rounded">{{ $mapels->lastPage() }}</a>
        @endif

        @if ($mapels->hasMorePages())
            <a href="{{ $mapels->nextPageUrl() }}" class="px-3 py-1 bg-blue-600 text-white rounded ml-1">Next</a>
        @else
            <span class="px-3 py-1 bg-gray-100 text-gray-400 rounded ml-1">Next</span>
        @endif
    </div>
@endsection
