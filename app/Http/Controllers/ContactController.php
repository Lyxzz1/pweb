<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        // Proses penyimpanan pesan kontak
        // ...

        return redirect()->back()->with('success', 'Pesan berhasil dikirim!');
    }
} 