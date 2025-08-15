@extends('layouts.app')

@section('title', 'Tambah Mapel')
@section('header', 'Tambah Mata Pelajaran')

@section('content')
    <div class="mx-auto bg-white rounded-2xl shadow-lg p-6">
        <form action="{{ route('mapel.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="nama_mapel" class="block text-sm font-medium text-gray-700 mb-1">Nama Mapel</label>
                <input type="text" name="nama_mapel" id="nama_mapel" value="{{ old('nama_mapel') }}"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Masukkan nama mata pelajaran" required>
                @error('nama_mapel')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex justify-end gap-3 pt-4">
                <a href="{{ route('mapel.index') }}"
                    class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-100">Batal</a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Simpan</button>
            </div>
        </form>
    </div>
@endsection
