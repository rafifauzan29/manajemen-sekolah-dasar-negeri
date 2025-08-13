@extends('layouts.app')

@section('title', 'Tambah Kelas')
@section('header', 'Tambah Kelas')

@section('content')
    <div class="mx-auto bg-white rounded-2xl shadow-lg p-6">
        <h2 class="text-lg font-semibold text-gray-800 mb-5">Form Tambah Kelas</h2>

        @if ($errors->any())
            <div class="mb-5 p-4 rounded-lg bg-red-50 border border-red-200 text-red-700 text-sm">
                <ul class="list-disc list-inside space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('kelas.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="nama_kelas" class="block text-sm font-medium text-gray-600 mb-1">Nama Kelas</label>
                <input type="text" name="nama_kelas" id="nama_kelas"
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 px-3 py-2"
                    placeholder="Masukkan nama kelas" value="{{ old('nama_kelas') }}">
            </div>
            <div>
                <label for="wali_kelas_id" class="block text-sm font-medium text-gray-600 mb-1">Wali Kelas</label>
                <select name="wali_kelas_id" id="wali_kelas_id"
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 px-3 py-2">
                    <option value="">-- Pilih Wali Kelas (Opsional) --</option>
                    @foreach ($gurus as $guru)
                        <option value="{{ $guru->id }}" {{ old('wali_kelas_id') == $guru->id ? 'selected' : '' }}>
                            {{ $guru->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="flex justify-end gap-3 pt-4">
                <a href="{{ route('kelas.index') }}"
                    class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-100">Batal</a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Simpan</button>
            </div>
        </form>
    </div>
@endsection
