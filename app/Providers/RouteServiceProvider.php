<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/'; // default redirect

    public function redirectTo(Request $request)
    {
        if ($request->user()->role->name === 'admin') {
            return '/admin/dashboard';
        }
        
        return '/pelanggan/dashboard';
    }

    // ... existing code ...
}