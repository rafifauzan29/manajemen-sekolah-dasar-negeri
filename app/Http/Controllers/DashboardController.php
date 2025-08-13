<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Kelas;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->hasRole('admin')) {
            $totalGuru = User::role('guru')->count();
            $totalSiswa = Siswa::count();
            $totalKelas = Kelas::count();

            $pengumuman = [
                "Pendaftaran siswa baru dibuka mulai 1 September 2025.",
                "Rapat guru akan diadakan pada hari Jumat, 15 Agustus 2025.",
                "Perbaikan fasilitas kelas dijadwalkan minggu depan."
            ];

            return view('admin.dashboard.index', compact('totalGuru', 'totalSiswa', 'totalKelas', 'pengumuman'));
        }

        if ($user->hasRole('guru')) {
            return view('guru.dashboard.index');
        }

        return redirect()->route('login')->with('error', 'Role tidak ditemukan.');
    }
}
