@extends('admin.dashboard')

@section('content')
<h2 class="text-xl font-bold mb-4">Edit Category</h2>

@if ($errors->any())
<div class="bg-red-100 text-red-700 p-3 rounded mb-4">
    <ul>
        @foreach ($errors->all() as $error)
            <li>- {{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('admin.categories.update', $category->id) }}" method="POST" class="space-y-4">
    @csrf
    @method('PUT')
    <div>
        <label class="block mb-1">Category Name</label>
        <input type="text" name="name" value="{{ $category->name }}" class="w-full border px-3 py-2 rounded" required>
    </div>
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
</form>
@endsection
