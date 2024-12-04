<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lapangan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'deskripsi',
        'harga',
        'status',
        'gambar'
    ];

    protected $casts = [
        'status' => 'boolean',
        'harga' => 'integer'
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
