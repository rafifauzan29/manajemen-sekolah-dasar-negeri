<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\User;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwal = Jadwal::with(['kelas', 'mapel', 'guru'])
            ->orderBy('hari')
            ->paginate(10);

        return view('admin.jadwal.index', compact('jadwal'));
    }

    public function create()
    {
        $kelas = Kelas::with('waliKelas')->get();
        $mapel = Mapel::all();
        $guru = User::role('guru')->get();
        return view('admin.jadwal.create', compact('kelas', 'mapel', 'guru'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kelas_id' => 'required|exists:kelas,id',
            'mapel_id' => 'nullable|exists:mapel,id',
            'guru_id' => 'nullable|exists:users,id',
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required|after:jam_mulai',
        ]);

        Jadwal::create($request->all());

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil ditambahkan.');
    }

    public function edit(Jadwal $jadwal)
    {
        $kelas = Kelas::with('waliKelas')->get();
        $mapel = Mapel::all();
        $guru = User::role('guru')->get();
        return view('admin.jadwal.edit', compact('jadwal', 'kelas', 'mapel', 'guru'));
    }

    public function update(Request $request, Jadwal $jadwal)
    {
        $request->validate([
            'kelas_id' => 'required|exists:kelas,id',
            'mapel_id' => 'nullable|exists:mapel,id',
            'guru_id' => 'nullable|exists:users,id',
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required|after:jam_mulai',
        ]);

        $jadwal->update($request->all());

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil diperbarui.');
    }

    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dihapus.');
    }
}
