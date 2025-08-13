@extends('layouts.app')

@section('title', 'Edit Siswa')
@section('header', 'Edit Siswa')

@section('content')
    <div class="mx-auto bg-white rounded-2xl shadow-lg p-6">
        <h2 class="text-lg font-semibold text-gray-800 mb-5">Form Edit Siswa</h2>

        @if ($errors->any())
            <div class="mb-5 p-4 rounded-lg bg-red-50 border border-red-200 text-red-700 text-sm">
                <ul class="list-disc list-inside space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('siswa.update', $siswa->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label for="nama" class="block text-sm font-medium text-gray-600 mb-1">Nama</label>
                <input type="text" name="nama" id="nama" value="{{ old('nama', $siswa->nama) }}"
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 px-3 py-2"
                    placeholder="Masukkan nama siswa">
            </div>
            <div>
                <label for="nisn" class="block text-sm font-medium text-gray-600 mb-1">NISN</label>
                <input type="text" name="nisn" id="nisn" value="{{ old('nis', $siswa->nisn) }}"
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 px-3 py-2"
                    placeholder="Masukkan NISN siswa">
            </div>
            <div>
                <label for="kelas_id" class="block text-sm font-medium text-gray-600 mb-1">Kelas</label>
                <select name="kelas_id" id="kelas_id"
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 px-3 py-2">
                    <option value="">-- Pilih Kelas --</option>
                    @foreach ($kelasList as $kelas)
                        <option value="{{ $kelas->id }}"
                            {{ old('kelas_id', $siswa->kelas_id) == $kelas->id ? 'selected' : '' }}>
                            {{ $kelas->nama_kelas }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="flex justify-end gap-3 pt-4">
                <a href="{{ route('siswa.index') }}" class="px-4 py-2 border border-gray-300 rounded-lg">Batal</a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Simpan</button>
            </div>
        </form>
    </div>
@endsection
