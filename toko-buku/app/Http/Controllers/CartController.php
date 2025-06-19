<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::with('book')->where('user_id', Auth::id())->get();
        return view('cart.index', compact('carts'));
    }

    public function store(Request $request)
    {
        $cart = Cart::updateOrCreate(
            ['user_id' => Auth::id(), 'book_id' => $request->book_id],
            ['quantity' => \DB::raw('quantity + 1')]
        );

        return redirect()->back()->with('success', 'Book added to cart!');
    }

    public function destroy($id)
    {
        Cart::where('id', $id)->where('user_id', Auth::id())->delete();
        return back()->with('success', 'Item removed');
    }
}

}
