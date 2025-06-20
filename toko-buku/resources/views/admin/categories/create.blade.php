@extends('admin.dashboard')

@section('content')
<h2 class="text-xl font-bold mb-4">Add New Category</h2>

@if(session('success'))
    <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>- {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.categories.store') }}" method="POST" class="space-y-4">
    @csrf
    <div>
        <label class="block mb-1">Category Name</label>
        <input type="text" name="name" class="w-full border border-gray-300 px-3 py-2 rounded" required>
    </div>
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Save</button>
</form>
@endsection
