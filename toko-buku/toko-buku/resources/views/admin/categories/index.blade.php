@extends('admin.dashboard')

@section('content')
<h1 class="text-2xl font-bold mb-4">Book Categories</h1>

<a href="{{ route('categories.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">+ Add Category</a>

@if(session('success'))
    <p class="text-green-600 mt-2">{{ session('success') }}</p>
@endif

<table class="mt-6 w-full bg-white rounded shadow">
    <thead class="bg-blue-100">
        <tr>
            <th class="py-2 px-4">ID</th>
            <th class="py-2 px-4">Name</th>
            <th class="py-2 px-4">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $cat)
        <tr class="border-t text-sm">
            <td class="py-2 px-4">{{ $cat->id }}</td>
            <td class="py-2 px-4">{{ $cat->name }}</td>
            <td class="py-2 px-4 space-x-2">
                <a href="{{ route('categories.edit', $cat->id) }}" class="text-blue-600">Edit</a>
                <form action="{{ route('categories.destroy', $cat->id) }}" method="POST" class="inline">
                    @csrf @method('DELETE')
                    <button onclick="return confirm('Delete this category?')" class="text-red-600">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
