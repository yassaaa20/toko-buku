<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class ProductController extends Controller
{
 public function index()
    {
        $books = Book::all();
        return view('product.index', compact('books'));
    }
}
