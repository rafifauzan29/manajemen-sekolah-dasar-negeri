@extends('layouts.app')

@section('title', 'Edit Jadwal')
@section('header', 'Edit Jadwal Pelajaran')

@section('content')
    <div class="mx-auto bg-white rounded-2xl shadow-lg p-6">
        <h2 class="text-lg font-semibold text-gray-800 mb-5">Form Edit Jadwal</h2>

        @if ($errors->any())
            <div class="mb-5 p-4 rounded-lg bg-red-50 border border-red-200 text-red-700 text-sm">
                <ul class="list-disc list-inside space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('jadwal.update', $jadwal->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Kelas</label>
                <select name="kelas_id"
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 px-3 py-2" required>
                    @foreach($kelas as $k)
                        <option value="{{ $k->id }}" {{ old('kelas_id', $jadwal->kelas_id) == $k->id ? 'selected' : '' }}>
                            {{ $k->nama_kelas }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Mata Pelajaran</label>
                <select name="mapel_id"
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 px-3 py-2">
                    <option value="">-- Pilih Mata Pelajaran --</option>
                    @foreach($mapel as $m)
                        <option value="{{ $m->id }}" {{ old('mapel_id', $jadwal->mapel_id) == $m->id ? 'selected' : '' }}>
                            {{ $m->nama_mapel }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Guru</label>
                <select name="guru_id"
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 px-3 py-2">
                    <option value="">-- Pilih Guru --</option>
                    @foreach($guru as $g)
                        <option value="{{ $g->id }}" {{ old('guru_id', $jadwal->guru_id) == $g->id ? 'selected' : '' }}>
                            {{ $g->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Hari</label>
                <select name="hari"
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 px-3 py-2" required>
                    @foreach(['senin','selasa','rabu','kamis','jumat','sabtu'] as $hari)
                        <option value="{{ $hari }}" {{ old('hari', $jadwal->hari) == $hari ? 'selected' : '' }}>
                            {{ ucfirst($hari) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Jam Mulai</label>
                    <input type="time" name="jam_mulai"
                        value="{{ old('jam_mulai', $jadwal->jam_mulai) }}"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 px-3 py-2" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Jam Selesai</label>
                    <input type="time" name="jam_selesai"
                        value="{{ old('jam_selesai', $jadwal->jam_selesai) }}"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 px-3 py-2" required>
                </div>
            </div>

            <div class="flex justify-end gap-3 pt-4">
                <a href="{{ route('jadwal.index') }}"
                    class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-100">Batal</a>
                <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Simpan</button>
            </div>
        </form>
    </div>
@endsection
