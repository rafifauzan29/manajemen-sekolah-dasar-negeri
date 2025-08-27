<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use App\Models\Pengaturan;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);

        $pengaturan = Pengaturan::first() ?? (object) [
            'nama_sekolah' => 'Manajemen Sekolah',
            'logo' => 'images/logo.png',
            'tema' => 'blue',
        ];

        $warna = Session::get('tema', $pengaturan->tema ?? 'blue');

        $themeMap = [
            'blue' => [
                'light' => 'bg-blue-50',
                'text' => 'text-blue-600',
                'btn_from' => 'from-[#2563EB]',
                'btn_to' => 'to-[#1E3A8A]',
                'hover_from' => 'from-[#1D4ED8]',
                'hover_to' => 'to-[#1E3A8A]',
                'ring' => 'focus:ring-[#2563EB]',
                'bg_nav' => 'bg-[#2563EB]',
                'sidebar_text' => 'text-white',
            ],
            'indigo' => [
                'light' => 'bg-indigo-50',
                'text' => 'text-indigo-600',
                'btn_from' => 'from-[#4F46E5]',
                'btn_to' => 'to-[#1E40AF]',
                'hover_from' => 'from-[#4338CA]',
                'hover_to' => 'to-[#1E40AF]',
                'ring' => 'focus:ring-[#4F46E5]',
                'bg_nav' => 'bg-[#4F46E5]',
                'sidebar_text' => 'text-white',
            ],
            'green' => [
                'light' => 'bg-emerald-50',
                'text' => 'text-emerald-600',
                'btn_from' => 'from-[#059669]',
                'btn_to' => 'to-[#065F46]',
                'hover_from' => 'from-[#047857]',
                'hover_to' => 'to-[#065F46]',
                'ring' => 'focus:ring-[#059669]',
                'bg_nav' => 'bg-[#059669]',
                'sidebar_text' => 'text-white',
            ],
            'red' => [
                'light' => 'bg-red-50',
                'text' => 'text-red-600',
                'btn_from' => 'from-[#DC2626]',
                'btn_to' => 'to-[#991B1B]',
                'hover_from' => 'from-[#B91C1C]',
                'hover_to' => 'to-[#7F1D1D]',
                'ring' => 'focus:ring-[#DC2626]',
                'bg_nav' => 'bg-[#DC2626]',
                'sidebar_text' => 'text-white',
            ],
            'purple' => [
                'light' => 'bg-purple-50',
                'text' => 'text-purple-600',
                'btn_from' => 'from-[#9333EA]',
                'btn_to' => 'to-[#6D28D9]',
                'hover_from' => 'from-[#7E22CE]',
                'hover_to' => 'to-[#5B21B6]',
                'ring' => 'focus:ring-[#9333EA]',
                'bg_nav' => 'bg-[#9333EA]',
                'sidebar_text' => 'text-white',
            ],
            'light' => [
                'light' => 'bg-gray-200',
                'text' => 'text-gray-800',
                'btn_from' => 'from-gray-300',
                'btn_to' => 'to-gray-500',
                'hover_from' => 'from-gray-400',
                'hover_to' => 'to-gray-600',
                'ring' => 'focus:ring-gray-300',
                'bg_nav' => 'bg-white',
                'sidebar_text' => 'text-gray-800',
            ],
        ];

        $theme = $themeMap[$warna] ?? $themeMap['blue'];

        View::share(compact('pengaturan', 'theme', 'warna'));
    }
}
