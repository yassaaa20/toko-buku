@extends('admin.dashboard')

@section('content')
<div class="bg-white p-6 rounded shadow">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold">Book Categories</h2>
        <a href="{{ route('admin.categories.create') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">
            + Add Category
        </a>
    </div>

    @if (session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full border rounded overflow-hidden shadow text-sm">
        <thead class="bg-blue-100 text-left">
            <tr>
                <th class="px-4 py-2 font-semibold">ID</th>
                <th class="px-4 py-2 font-semibold">Name</th>
                <th class="px-4 py-2 font-semibold">Actions</th>
            </tr>
        </thead>
        <tbody>
    @forelse ($categories as $index => $category)
        <tr class="border-t hover:bg-gray-50">
            <td class="px-4 py-2">{{ $index + 1 }}</td> <!-- Nomor urut -->
            <td class="px-4 py-2">{{ $category->name }}</td>
            <td class="px-4 py-2 space-x-2">
                <a href="{{ route('admin.categories.edit', $category->id) }}"
                   class="text-blue-600 hover:underline">Edit</a>
                <form action="{{ route('admin.categories.destroy', $category->id) }}"
                      method="POST" class="inline"
                      onsubmit="return confirm('Are you sure?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:underline">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="3" class="px-4 py-4 text-center text-gray-500">No categories found.</td>
        </tr>
    @endforelse
    </tbody>
    </table>
</div>
@endsection
