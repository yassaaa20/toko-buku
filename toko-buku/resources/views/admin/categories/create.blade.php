@extends('admin.dashboard')

@section('content')
<h2 class="text-xl font-bold mb-4">Add New Category</h2>

<form action="{{ route('categories.store') }}" method="POST" class="space-y-4">
    @csrf
    <div>
        <label class="block mb-1">Category Name</label>
        <input type="text" name="name" class="w-full border border-gray-300 px-3 py-2 rounded" required>
    </div>
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Save</button>
</form>
@endsection

@extends('admin.dashboard')

@section('content')
<h2 class="text-2xl font-bold mb-4">Add New Book</h2>

<form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf
    <input name="title" placeholder="Title" class="w-full border px-3 py-2 rounded" required>
    <input name="author" placeholder="Author" class="w-full border px-3 py-2 rounded" required>

    <select name="category_id" class="w-full border px-3 py-2 rounded" required>
        <option value="">Select Category</option>
        @foreach($categories as $cat)
            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
        @endforeach
    </select>

    <input type="file" name="cover" class="w-full border px-3 py-2 rounded">
    <textarea name="description" placeholder="Description (optional)" class="w-full border px-3 py-2 rounded"></textarea>

    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Save</button>
</form>
@endsection
