<?php

namespace App\Http\Controllers;

use App\Models\Lapangan;
use App\Models\User;
use App\Models\Booking;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function __construct()
    {
        // Route yang bisa diakses tanpa login
        $this->middleware('guest')->only(['index', 'about', 'contact', 'lapangan']);
    }

    public function index()
    {
        // $lapangan = Lapangan::where('status', true)->get();
        $lapangan = Lapangan::all();
        // dd($lapangan);
        return view('homepage', compact('lapangan'));
    
    }

    public function lapangan()
    {
        $lapangan = Lapangan::where('status', true)->get();
        return view('lapangan', compact('lapangan'));
    }
    

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function contactStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Simpan pesan kontak atau kirim email ke admin
        // ... implementasi sesuai kebutuhan

        return redirect()->back()->with('success', 'Pesan Anda telah terkirim!');
    }
} 