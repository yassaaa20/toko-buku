<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Book;

class CartController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
        ]);

        Cart::create([
            'user_id' => auth()->id(),
            'book_id' => $request->book_id,
            'quantity' => 1,
        ]);

        return redirect()->back()->with('success', 'Book added to cart!');
    }
}
