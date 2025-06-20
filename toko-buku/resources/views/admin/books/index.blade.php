@extends('admin.dashboard')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Book List</h2>
        <a href="{{ route('admin.books.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
            + Add Book
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 shadow-md rounded text-sm md:text-base">
            <thead class="bg-blue-100 text-gray-700">
                <tr>
                    <th class="px-4 py-2 border text-left">Cover</th>
                    <th class="px-4 py-2 border text-left">Title</th>
                    <th class="px-4 py-2 border text-left">Category</th>
                    <th class="px-4 py-2 border text-left">Author</th>
                    <th class="px-4 py-2 border text-left">Description</th>
                    <th class="px-4 py-2 border text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($books as $book)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-4 py-2 border">
                            @if($book->cover)
                                <img src="{{ asset('storage/' . $book->cover) }}" alt="{{ $book->title }}"
                                     class="w-16 h-20 object-cover rounded-md shadow mx-auto">
                            @else
                                <span class="text-gray-400 italic">No cover</span>
                            @endif
                        </td>
                        <td class="px-4 py-2 border">{{ $book->title }}</td>
                        <td class="px-4 py-2 border">{{ $book->category->name }}</td>
                        <td class="px-4 py-2 border">{{ $book->author }}</td>
                        <td class="px-4 py-2 border">{{ \Illuminate\Support\Str::limit($book->description, 100) }}</td>
                        <td class="px-4 py-2 border text-center">
                            <a href="{{ route('admin.books.edit', $book->id) }}"
                               class="text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('admin.books.destroy', $book->id) }}"
                                  method="POST" class="inline-block"
                                  onsubmit="return confirm('Are you sure you want to delete this book?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline ml-2">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-3 border text-center text-gray-500">No books available.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
