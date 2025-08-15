@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-center mt-8 space-x-4">
        {{-- Tombol Previous --}}
        @if ($paginator->onFirstPage())
            <span class="px-5 py-2 text-sm font-medium text-gray-400 bg-gray-100 rounded-full cursor-not-allowed shadow-inner">
                Sebelumnya
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
               class="px-5 py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-full shadow-md transition-all duration-200">
                Sebelumnya
            </a>
        @endif

        {{-- Nomor Halaman --}}
        <div class="flex items-center gap-2">
            @foreach ($elements as $element)
                {{-- Tanda titik --}}
                @if (is_string($element))
                    <span class="px-4 py-2 text-sm text-gray-500">{{ $element }}</span>
                @endif

                {{-- Link halaman --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="w-10 h-10 flex items-center justify-center text-sm font-bold text-white bg-blue-600 rounded-full shadow-lg">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $url }}"
                               class="w-10 h-10 flex items-center justify-center text-sm font-medium text-blue-600 bg-blue-50 hover:bg-blue-100 rounded-full shadow transition-all duration-200">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </div>

        {{-- Tombol Next --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next"
               class="px-5 py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-full shadow-md transition-all duration-200">
                Selanjutnya
            </a>
        @else
            <span class="px-5 py-2 text-sm font-medium text-gray-400 bg-gray-100 rounded-full cursor-not-allowed shadow-inner">
                Selanjutnya
            </span>
        @endif
    </nav>
@endif
