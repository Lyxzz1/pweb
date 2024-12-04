<?php

namespace App\Http\Controllers;

use App\Models\Lapangan;
use Illuminate\Http\Request;

class PelangganLapanganController extends Controller
{
    public function index()
    {
        $lapangan = Lapangan::all();
        return view('pelanggan.lapangan.index', compact('lapangan'));
    }

    public function show(Lapangan $lapangan)
    {
        return view('pelanggan.lapangan.show', compact('lapangan'));
    }

    public function search(Request $request)
    {
        $keyword = $request->search;
        
        $lapangan = Lapangan::query()
            ->when($keyword, function($query) use ($keyword) {
                return $query->where(function($q) use ($keyword) {
                    $q->where('nama', 'like', '%' . $keyword . '%')
                      ->orWhere('deskripsi', 'like', '%' . $keyword . '%');
                });
            })
            ->get();
        
        return view('pelanggan.lapangan.index', compact('lapangan'));
    }
} 