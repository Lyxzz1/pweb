<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Lapangan;
use Illuminate\Http\Request;

class AdminBookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with(['user', 'lapangan'])
            ->latest()
            ->get();
        
        return view('admin.bookings.index', compact('bookings'));
    }

    public function create()
    {
        $lapangan = Lapangan::all();
        return view('admin.bookings.create', compact('lapangan'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'lapangan_id' => 'required|exists:lapangans,id',
            'tanggal' => 'required|date|after_or_equal:today',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required|after:jam_mulai',
            'catatan' => 'nullable|string'
        ]);

        // Hitung total jam
        $jam_mulai = strtotime($request->jam_mulai);
        $jam_selesai = strtotime($request->jam_selesai);
        $diff = $jam_selesai - $jam_mulai;
        $jam = $diff / 3600;

        // Ambil harga lapangan
        $lapangan = Lapangan::find($request->lapangan_id);
        $total_harga = $lapangan->harga * $jam;

        $booking = Booking::create([
            'user_id' => auth()->id(),
            'lapangan_id' => $request->lapangan_id,
            'tanggal' => $request->tanggal,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'total_harga' => $total_harga,
            'status' => 'pending',
            'catatan' => $request->catatan
        ]);

        return redirect()->route('admin.bookings.index')
            ->with('success', 'Booking berhasil dibuat');
    }

    public function edit(Booking $booking)
    {
        $lapangan = Lapangan::all();
        return view('admin.bookings.edit', compact('booking', 'lapangan'));
    }

    public function update(Request $request, Booking $booking)
    {
        $validated = $request->validate([
            'lapangan_id' => 'required|exists:lapangans,id',
            'tanggal' => 'required|date',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required|after:jam_mulai',
            'status' => 'required|in:pending,confirmed,cancelled,completed',
            'catatan' => 'nullable|string'
        ]);

        // Hitung total jam
        $jam_mulai = strtotime($request->jam_mulai);
        $jam_selesai = strtotime($request->jam_selesai);
        $diff = $jam_selesai - $jam_mulai;
        $jam = $diff / 3600;

        // Ambil harga lapangan
        $lapangan = Lapangan::find($request->lapangan_id);
        $total_harga = $lapangan->harga * $jam;

        $booking->update([
            'lapangan_id' => $request->lapangan_id,
            'tanggal' => $request->tanggal,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'total_harga' => $total_harga,
            'status' => $request->status,
            'catatan' => $request->catatan
        ]);

        return redirect()->route('admin.bookings.index')
            ->with('success', 'Booking berhasil diperbarui');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()->route('admin.bookings.index')
            ->with('success', 'Booking berhasil dihapus');
    }
} 