@extends('admin.dashboard')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Book List</h1>
    <a href="{{ route('books.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded inline-block mb-4">+ Add Book</a>

    <table class="min-w-full bg-white rounded shadow">
        <thead class="bg-blue-100">
            <tr>
                <th class="py-2 px-4">Title</th>
                <th class="py-2 px-4">Category</th>
                <th class="py-2 px-4">Author</th>
                <th class="py-2 px-4">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr class="border-t text-sm">
                    <td class="py-2 px-4">{{ $book->title }}</td>
                    <td class="py-2 px-4">{{ $book->category->name }}</td>
                    <td class="py-2 px-4">{{ $book->author }}</td>
                    <td class="py-2 px-4 space-x-2">
                        <a href="{{ route('books.edit', $book->id) }}" class="text-blue-600">Edit</a>
                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Delete this book?')" class="text-red-600">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection