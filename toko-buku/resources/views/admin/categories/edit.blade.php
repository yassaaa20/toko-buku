@extends('admin.dashboard')

@section('content')
<h2 class="text-xl font-bold mb-4">Edit Category</h2>

<form action="{{ route('categories.update', $category->id) }}" method="POST" class="space-y-4">
    @csrf @method('PUT')
    <div>
        <label class="block mb-1">Category Name</label>
        <input type="text" name="name" value="{{ $category->name }}" class="w-full border border-gray-300 px-3 py-2 rounded" required>
    </div>
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
</form>
@endsection
