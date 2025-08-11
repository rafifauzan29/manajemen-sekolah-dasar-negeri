<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->hasRole('admin')) {
            return view('admin.dashboard');
        }

        if ($user->hasRole('guru')) {
            return view('guru.dashboard');
        }

        return redirect()->route('login')->with('error', 'Role tidak ditemukan.');
    }
}
