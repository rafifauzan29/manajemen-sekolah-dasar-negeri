@extends('layouts.app')

@section('title', 'Edit Guru')
@section('header', 'Edit Guru')

@section('content')
    <div class="mx-auto bg-white rounded-2xl shadow-lg p-6">
        <h2 class="text-lg font-semibold text-gray-800 mb-5">Form Edit Guru</h2>

        @if ($errors->any())
            <div class="mb-5 p-4 rounded-lg bg-red-50 border border-red-200 text-red-700 text-sm">
                <ul class="list-disc list-inside space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('guru.update', $guru->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label for="name" class="block text-sm font-medium text-gray-600 mb-1">Nama</label>
                <input type="text" name="name" id="name"
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 px-3 py-2"
                    value="{{ old('name', $guru->name) }}">
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-600 mb-1">Email</label>
                <input type="email" name="email" id="email"
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 px-3 py-2"
                    value="{{ old('email', $guru->email) }}">
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-600 mb-1">Password (Opsional)</label>
                <input type="password" name="password" id="password"
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 px-3 py-2"
                    placeholder="Kosongkan jika tidak ingin mengubah password">
            </div>
            <div class="flex justify-end gap-3 pt-4">
                <a href="{{ route('guru.index') }}" class="px-4 py-2 border border-gray-300 rounded-lg">Batal</a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Update</button>
            </div>
        </form>
    </div>
@endsection
