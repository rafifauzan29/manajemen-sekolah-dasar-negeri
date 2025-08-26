<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaturan;
use Illuminate\Support\Facades\Storage;

class PengaturanController extends Controller
{
    public function index()
    {
        $pengaturan = Pengaturan::first();
        return view('admin.pengaturan.index', compact('pengaturan'));
    }

    public function update(Request $request)
    {

        $request->validate([
            'nama_sekolah' => 'required|string|max:255',
            'tema' => 'required|string|max:50',
            'logo' => 'nullable|image',
        ]);

        $pengaturan = Pengaturan::first();
        if (!$pengaturan) {
            $pengaturan = new Pengaturan();
        }

        $pengaturan->nama_sekolah = $request->nama_sekolah;
        $pengaturan->tema = $request->tema;

        if ($request->hasFile('logo')) {

            if ($pengaturan->logo && Storage::disk('public')->exists($pengaturan->logo)) {
                Storage::disk('public')->delete($pengaturan->logo);
            }

            $path = $request->file('logo')->store('logos', 'public');
            $pengaturan->logo = $path;
        }

        $pengaturan->save();

        return redirect()->route('pengaturan.index')->with('success', 'Pengaturan berhasil diperbarui!');
    }
}
