@extends('layouts.app')

@section('title', 'Dashboard Guru')
@section('header', 'Dashboard Guru')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

    <div class="bg-yellow-400 text-gray-900 rounded-lg p-6 shadow-lg">
        <h3 class="text-xl font-semibold mb-4">Jadwal Mengajar Hari Ini</h3>
        <table class="w-full text-left">
            <thead>
                <tr>
                    <th class="pb-2 border-b">Mapel</th>
                    <th class="pb-2 border-b">Kelas</th>
                    <th class="pb-2 border-b">Jam</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Matematika</td>
                    <td>5A</td>
                    <td>08:00 - 09:30</td>
                </tr>
                <tr>
                    <td>Bahasa Indonesia</td>
                    <td>5B</td>
                    <td>10:00 - 11:30</td>
                </tr>
                <tr>
                    <td>IPA</td>
                    <td>6A</td>
                    <td>13:00 - 14:30</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="bg-blue-500 text-white rounded-lg p-6 shadow-lg">
        <h3 class="text-xl font-semibold mb-4">Rekap Absensi</h3>
        <ul class="list-disc list-inside space-y-2">
            <li>Hadir: 28 Hari</li>
            <li>Sakit: 1 Hari</li>
            <li>Izin: 0 Hari</li>
            <li>Alpha: 0 Hari</li>
        </ul>
    </div>
</div>

<div class="mt-8 bg-white rounded-lg p-6 shadow-lg">
    <h4 class="text-lg font-semibold mb-4">Pengumuman untuk Guru</h4>
    <ul class="list-disc list-inside space-y-2 text-gray-700">
        <li>Input nilai semester genap dimulai tanggal 1 Desember 2025.</li>
        <li>Jadwal rapat guru akan diumumkan segera.</li>
    </ul>
</div>
@endsection
