@extends('layouts.app')

@section('title', 'Dashboard Admin')
@section('header', 'Dashboard Admin')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    <div class="bg-blue-600 text-white rounded-lg p-6 shadow-lg">
        <h3 class="text-xl font-semibold mb-2">Total Guru</h3>
        <p class="text-4xl font-bold">25</p>
    </div>

    <div class="bg-green-600 text-white rounded-lg p-6 shadow-lg">
        <h3 class="text-xl font-semibold mb-2">Total Siswa</h3>
        <p class="text-4xl font-bold">320</p>
    </div>

    <div class="bg-purple-600 text-white rounded-lg p-6 shadow-lg">
        <h3 class="text-xl font-semibold mb-2">Total Kelas</h3>
        <p class="text-4xl font-bold">12</p>
    </div>
</div>

<div class="mt-8 bg-white rounded-lg p-6 shadow-lg">
    <h4 class="text-lg font-semibold mb-4">Pengumuman Terbaru</h4>
    <ul class="list-disc list-inside space-y-2 text-gray-700">
        <li>Pendaftaran siswa baru dibuka mulai 1 September 2025.</li>
        <li>Rapat guru akan diadakan pada hari Jumat, 15 Agustus 2025.</li>
        <li>Perbaikan fasilitas kelas dijadwalkan minggu depan.</li>
    </ul>
</div>
@endsection
