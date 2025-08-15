<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class GuruController extends Controller
{
    public function index()
    {
        $gurus = User::role('guru')
            ->with('kelasYangDiaWali')
            ->paginate(10);

        return view('admin.guru.index', compact('gurus'));
    }

    public function create()
    {
        return view('admin.guru.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        $guru = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        $guru->assignRole('guru');

        return redirect()->route('guru.index')->with('success', 'Guru berhasil ditambahkan');
    }

    public function edit($id)
    {
        $guru = User::findOrFail($id);
        return view('admin.guru.edit', compact('guru'));
    }

    public function update(Request $request, $id)
    {
        $guru = User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6'
        ]);

        $guru->name = $validated['name'];
        $guru->email = $validated['email'];

        if (!empty($validated['password'])) {
            $guru->password = bcrypt($validated['password']);
        }

        $guru->save();

        return redirect()->route('guru.index')->with('success', 'Data guru berhasil diperbarui');
    }

    public function destroy($id)
    {
        $guru = User::findOrFail($id);
        $guru->delete();
        return redirect()->route('guru.index')->with('success', 'Guru berhasil dihapus');
    }
}
