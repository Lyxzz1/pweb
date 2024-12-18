<?php

namespace App\Http\Controllers;

use App\Models\Lapangan;
use Illuminate\Http\Request;

class AdminLapanganController extends Controller
{
    public function index()
    {
        $lapangan = Lapangan::with('bookings')->get();
        return view('admin.lapangan.index', compact('lapangan'));
    }

    public function create()
    {
        return view('admin.lapangan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:10240'
        ]);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $nama_gambar = time() . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('images/lapangan'), $nama_gambar);
            $validated['gambar'] = $nama_gambar;
        }

        Lapangan::create($validated);

        return redirect()->route('admin.lapangan.index')
            ->with('success', 'Lapangan berhasil ditambahkan');
    }

    public function edit(Lapangan $lapangan)
    {
        return view('admin.lapangan.edit', compact('lapangan'));
    }

    public function update(Request $request, Lapangan $lapangan)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:10240'
        ]);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($lapangan->gambar && file_exists(public_path('images/lapangan/' . $lapangan->gambar))) {
                unlink(public_path('images/lapangan/' . $lapangan->gambar));
            }
            
            $gambar = $request->file('gambar');
            $nama_gambar = time() . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('images/lapangan'), $nama_gambar);
            $validated['gambar'] = $nama_gambar;
        }

        $lapangan->update($validated);

        return redirect()->route('admin.lapangan.index')
            ->with('success');
    }

    public function destroy(Lapangan $lapangan)
    {
        if ($lapangan->gambar && file_exists(public_path('images/lapangan/' . $lapangan->gambar))) {
            unlink(public_path('images/lapangan/' . $lapangan->gambar));
        }
        
        $lapangan->delete();

        return redirect()->route('admin.lapangan.index')
            ->with('success');
    }
}
