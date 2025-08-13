<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login - SDN Cikijing 3</title>
    @vite('resources/css/app.css')
</head>
<body class="min-h-screen flex items-center justify-center relative px-4 sm:px-0">

    <div class="absolute inset-0">
        <img src="{{ asset('images/bg-login.jpg') }}" alt="Background"
            class="w-full h-full object-cover brightness-50 filter blur-[3px]" />
    </div>
    <div class="relative bg-white bg-opacity-90 rounded-lg shadow-lg p-6 sm:p-8 max-w-md w-full mx-auto z-10">

        <div class="flex justify-center mb-4">
            <img src="{{ asset('images/logo.png') }}" alt="Logo SDN Cikijing 3" class="h-12 sm:h-16 w-auto" />
        </div>

        <h2 class="text-2xl sm:text-3xl font-bold text-center text-gray-800 mb-6">Masuk ke SDN Cikijing 3</h2>

        @if (session('error'))
            <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4 sm:mb-5">
                <label for="email"
                    class="block text-gray-700 mb-1 sm:mb-2 font-medium text-sm sm:text-base">Email</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus
                    class="w-full px-3 py-2 sm:py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm sm:text-base" />
                @error('email')
                    <p class="text-red-600 text-xs sm:text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5 sm:mb-6">
                <label for="password" class="block text-gray-700 mb-1 sm:mb-2 font-medium text-sm sm:text-base">Kata
                    Sandi</label>
                <input id="password" name="password" type="password" required
                    class="w-full px-3 py-2 sm:py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm sm:text-base" />
                @error('password')
                    <p class="text-red-600 text-xs sm:text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div
                class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-6 text-sm sm:text-base">
                <label class="inline-flex items-center text-gray-700 mb-2 sm:mb-0">
                    <input type="checkbox" name="remember" class="form-checkbox h-4 w-4 text-indigo-600" />
                    <span class="ml-2">Ingat saya</span>
                </label>

                <a href="#" class="text-indigo-600 hover:underline">Lupa kata sandi?</a>
            </div>

            <button type="submit"
                class="w-full bg-indigo-600 text-white font-semibold py-3 rounded-md hover:bg-indigo-700 transition duration-200 text-base">
                Masuk
            </button>
        </form>

        <p class="mt-6 text-center text-gray-600 text-xs sm:text-sm">
            &copy; {{ date('Y') }} SDN Cikijing 3. Semua hak dilindungi.
        </p>
    </div>
</body>
</html>
