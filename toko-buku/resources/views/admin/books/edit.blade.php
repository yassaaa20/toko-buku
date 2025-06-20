<form action="{{ route('admin.books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')
    <input name="title" value="{{ $book->title }}" required>
    <input name="author" value="{{ $book->author }}" required>

    <select name="category_id">
        @foreach($categories as $cat)
            <option value="{{ $cat->id }}" {{ $book->category_id == $cat->id ? 'selected' : '' }}>
                {{ $cat->name }}
            </option>
        @endforeach
    </select>

    @if($book->cover)
        <img src="{{ asset('storage/' . $book->cover) }}">
    @endif
    <input type="file" name="cover">
    <textarea name="description">{{ $book->description }}</textarea>

    <button type="submit">Update Book</button>
</form>
