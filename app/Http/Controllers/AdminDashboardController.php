<?php

namespace App\Http\Controllers;

use App\Models\Lapangan;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Ambil semua data lapangan
        $lapangan = Lapangan::withCount('bookings')->get();
        
        // Hitung total booking
        $totalBooking = Booking::count();
        
        // Hitung total pendapatan
        $totalPendapatan = Booking::where('status', 'confirmed')->sum('total_harga');

        return view('admin.dashboard', compact('lapangan', 'totalBooking', 'totalPendapatan'));
    }
}
