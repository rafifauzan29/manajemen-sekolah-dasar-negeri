@extends('layouts.app')

@section('title', 'Dashboard Admin')
@section('header', 'Dashboard Admin')

@section('content')
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

        <div
            class="bg-blue-600 text-white rounded-xl shadow-lg p-6 transform transition hover:-translate-y-1 hover:shadow-2xl">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-xl font-semibold">Total Guru</h3>
                    <p class="text-4xl font-bold mt-2">{{ $totalGuru }}</p>
                </div>
                <div class="bg-blue-500 rounded-full p-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 14l6.16-3.422a12 12 0 010 6.844L12 14z" />
                    </svg>
                </div>
            </div>
        </div>

        <div
            class="bg-green-600 text-white rounded-xl shadow-lg p-6 transform transition hover:-translate-y-1 hover:shadow-2xl">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-xl font-semibold">Total Siswa</h3>
                    <p class="text-4xl font-bold mt-2">{{ $totalSiswa }}</p>
                </div>
                <div class="bg-green-500 rounded-full p-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5.121 17.804A9 9 0 1118.878 6.196 9 9 0 015.12 17.804z" />
                    </svg>
                </div>
            </div>
        </div>

        <div
            class="bg-purple-600 text-white rounded-xl shadow-lg p-6 transform transition hover:-translate-y-1 hover:shadow-2xl">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-xl font-semibold">Total Kelas</h3>
                    <p class="text-4xl font-bold mt-2">{{ $totalKelas }}</p>
                </div>
                <div class="bg-purple-500 rounded-full p-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                    </svg>
                </div>
            </div>
        </div>

    </div>

    <div class="mt-8 bg-white rounded-xl shadow-lg p-6">
        <h4 class="text-lg font-semibold mb-4">Pengumuman Terbaru</h4>
        <ul class="list-disc list-inside space-y-2 text-gray-700">
            @foreach ($pengumuman as $item)
                <li>{{ $item }}</li>
            @endforeach
        </ul>
    </div>
@endsection
