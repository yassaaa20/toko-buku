@extends('admin.dashboard')

@section('content')
<h2 class="text-2xl font-bold mb-6">Add New Book</h2>

@if ($errors->any())
<div class="bg-red-100 text-red-700 p-3 rounded mb-4">
    <ul>
        @foreach ($errors->all() as $error)
            <li>- {{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('admin.books.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf

    <div>
        <label class="block mb-1 font-semibold">Title</label>
        <input type="text" name="title" class="w-full border rounded px-3 py-2" value="{{ old('title') }}">
    </div>

    <div>
        <label class="block mb-1 font-semibold">Author</label>
        <input type="text" name="author" class="w-full border rounded px-3 py-2" value="{{ old('author') }}">
    </div>

    <div>
        <label class="block mb-1 font-semibold">Category</label>
        <select name="category_id" class="w-full border rounded px-3 py-2">
            <option value="">-- Choose Category --</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="block mb-1 font-semibold">Cover Image</label>
        <input type="file" name="cover" class="w-full border rounded px-3 py-2">
    </div>

    <div>
        <label class="block mb-1 font-semibold">Description</label>
        <textarea name="description" class="w-full border rounded px-3 py-2" rows="4">{{ old('description') }}</textarea>
    </div>

    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">
        Add Book
    </button>
</form>
@endsection
