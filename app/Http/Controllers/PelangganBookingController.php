<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Lapangan;
use Illuminate\Http\Request;

class PelangganBookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with('lapangan')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('pelanggan.booking.index', compact('bookings'));
    }

    public function create(Request $request)
    {
        $selectedLapangan = null;
        if ($request->has('lapangan_id')) {
            $selectedLapangan = Lapangan::findOrFail($request->lapangan_id);
        }
        
        $lapangan = Lapangan::where('status', true)->get();
        return view('pelanggan.booking.create', compact('lapangan', 'selectedLapangan'));
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

        return redirect()->route('booking.show', $booking->id)
            ->with('success', 'Booking berhasil dibuat');
    }

    public function show(Booking $booking)
    {
        $this->authorize('view', $booking);
        return view('pelanggan.booking.show', compact('booking'));
    }

    public function destroy(Booking $booking)
    {
        $this->authorize('delete', $booking);

        if ($booking->status !== 'pending') {
            return back()->with('error', 'Hanya booking dengan status pending yang dapat dibatalkan.');
        }

        $booking->update(['status' => 'cancelled']);

        return redirect()->route('booking.index')
            ->with('success', 'Booking berhasil dibatalkan.');
    }
} 