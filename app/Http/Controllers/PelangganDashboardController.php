<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class PelangganDashboardController extends Controller
{
    public function dashboard()
    {
        $user = auth()->user();
        
        $totalBookings = Booking::where('user_id', $user->id)->count();
        $activeBookings = Booking::where('user_id', $user->id)
            ->where('status', 'confirmed')
            ->where('tanggal', '>=', now())
            ->count();
        $totalSpent = Booking::where('user_id', $user->id)
            ->where('status', 'confirmed')
            ->sum('total_harga');
        $recentBookings = Booking::with('lapangan')
            ->where('user_id', $user->id)
            ->latest()
            ->take(5)
            ->get();

        return view('pelanggan.dashboard', compact(
            'totalBookings',
            'activeBookings',
            'totalSpent',
            'recentBookings'
        ));
    }
} 