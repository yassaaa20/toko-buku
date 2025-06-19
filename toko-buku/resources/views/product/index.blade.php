@extends('layouts.app') {{-- Ganti dengan layout kamu jika berbeda --}}

@section('content')
<div class="max-w-7xl mx-auto px-4 py-10">
    <h2 class="text-3xl font-bold mb-8 text-center">Our Book Collection</h2>

    <div class="grid gap-8 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
        @foreach ($books as $book)
        <div class="bg-white rounded-lg shadow-md p-6">
            <img src="{{ $book->cover ?? 'https://source.unsplash.com/400x300/?book' }}" alt="{{ $book->title }}" class="w-full h-48 object-cover rounded mb-4">
            
            <h3 class="text-xl font-semibold mb-2">{{ $book->title }}</h3>
            <p class="text-gray-700 mb-2"><strong>Author:</strong> {{ $book->author }}</p>
            <p class="text-gray-600 text-sm mb-4">{{ Str::limit($book->description, 100) }}</p>

            {{-- Add to Cart --}}
            <form method="POST" action="{{ route('cart.store') }}">
                @csrf
                <input type="hidden" name="book_id" value="{{ $book->id }}">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-full text-sm">
                    Add to Cart
                </button>
            </form>
        </div>
        @endforeach
    </div>
</div>
@endsection
