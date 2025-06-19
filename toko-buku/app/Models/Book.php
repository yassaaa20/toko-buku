<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // Izinkan mass-assignment untuk field berikut
    protected $fillable = [
        'title',
        'author',
        'category_id',
        'cover',
        'description',
    ];

    // Relasi: buku milik satu kategori
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    // Relasi: satu buku bisa ada di banyak cart
public function cart()
{
    return $this->hasMany(Cart::class);
}

// Relasi: satu buku bisa ada di banyak order
public function orders()
{
    return $this->hasMany(Order::class);
}

    
}
