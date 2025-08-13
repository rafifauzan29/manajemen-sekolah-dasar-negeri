<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kelas;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::with('kelas')->paginate(10);
        return view('admin.siswa.index', compact('siswas'));
    }

    public function create()
    {
        $kelasList = Kelas::all();
        return view('admin.siswa.create', compact('kelasList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nisn' => 'required|string|max:20|unique:siswa,nisn',
            'kelas_id' => 'nullable|exists:kelas,id',
        ]);

        Siswa::create($request->all());

        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil ditambahkan.');
    }

    public function edit(Siswa $siswa)
    {
        $kelasList = Kelas::all();
        return view('admin.siswa.edit', compact('siswa', 'kelasList'));
    }

    public function update(Request $request, Siswa $siswa)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nisn' => 'required|string|max:20|unique:siswa,nisn,' . $siswa->id,
            'kelas_id' => 'nullable|exists:kelas,id',
        ]);

        $siswa->update($request->all());

        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil diperbarui.');
    }

    public function destroy(Siswa $siswa)
    {
        $siswa->delete();
        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil dihapus.');
    }
}
