@extends('layouts.app')

@section('title', 'Pengaturan')
@section('header', 'Pengaturan Website')

@section('content')
    <div class="mx-auto bg-white rounded-2xl shadow-lg p-6">
        <h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-6 flex items-center gap-2">
            ⚙️ Pengaturan Website
        </h2>

        <form action="{{ route('pengaturan.update', $pengaturan->id ?? 1) }}" method="POST" enctype="multipart/form-data"
            class="space-y-5">
            @csrf
            @method('PUT')

            <!-- Nama Sekolah -->
            <div>
                <label for="nama_sekolah" class="block text-sm font-medium text-gray-700 mb-1">Nama Sekolah</label>
                <input type="text" name="nama_sekolah" id="nama_sekolah"
                    value="{{ old('nama_sekolah', $pengaturan->nama_sekolah ?? '') }}"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-gray-800 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                    placeholder="Masukkan nama sekolah" required>
                @error('nama_sekolah')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tema Website -->
            <div>
                <label for="tema" class="block text-sm font-medium text-gray-700 mb-1">Tema Website</label>
                <select name="tema" id="tema"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-gray-800 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                    required>
                    <option value="blue" {{ isset($pengaturan) && $pengaturan->tema == 'blue' ? 'selected' : '' }}>Biru
                    </option>
                    <option value="green" {{ isset($pengaturan) && $pengaturan->tema == 'green' ? 'selected' : '' }}>Hijau
                    </option>
                    <option value="red" {{ isset($pengaturan) && $pengaturan->tema == 'red' ? 'selected' : '' }}>Merah
                    </option>
                    <option value="purple" {{ isset($pengaturan) && $pengaturan->tema == 'purple' ? 'selected' : '' }}>Ungu
                    </option>
                    <option value="light" {{ isset($pengaturan) && $pengaturan->tema == 'light' ? 'selected' : '' }}>Light
                    </option>
                </select>
            </div>

            <!-- Logo Website -->
            <div>
                <label for="logo" class="block text-sm font-medium text-gray-700 mb-1">Logo Website</label>

                @if (isset($pengaturan->logo))
                    <div class="mb-2">
                        <img id="logoPreview" src="{{ asset('storage/' . $pengaturan->logo) }}" class="h-16 w-auto" />
                    </div>
                @else
                    <div class="mb-2">
                        <img id="logoPreview" src="{{ asset('images/logo.png') }}" class="h-16 w-auto" />
                    </div>
                @endif

                <input type="file" name="logo" id="logo" accept="image/*"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-gray-800 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                    onchange="previewLogo(event)">
            </div>

            <script>
                function previewLogo(event) {
                    const reader = new FileReader();
                    reader.onload = function() {
                        const output = document.getElementById('logoPreview');
                        output.src = reader.result;
                    };
                    reader.readAsDataURL(event.target.files[0]);
                }
            </script>

            <div class="flex justify-end gap-3 pt-4">
                <a href="{{ url()->previous() }}"
                    class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-100 transition">
                    Batal
                </a>
                <button type="submit"
                    class="inline-flex items-center gap-2 px-5 py-2.5 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-lg shadow-lg hover:shadow-xl hover:from-blue-700 hover:to-indigo-700 transition-all">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
@endsection
