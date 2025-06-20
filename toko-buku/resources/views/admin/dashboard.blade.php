<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

    {{-- Top Navbar --}}
    <nav class="bg-blue-800 text-white px-6 py-4 flex justify-between items-center shadow">
        <div class="text-xl font-bold">Admin Dashboard</div>
        <div class="flex items-center space-x-4">
            <span>{{ Auth::user()->name }}</span>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="bg-red-600 hover:bg-red-700 px-3 py-1 rounded">Logout</button>
            </form>
        </div>
    </nav>

    {{-- Main Content --}}
    <div class="flex flex-1">
        {{-- Sidebar --}}
        <aside class="w-64 bg-white shadow-md p-6 space-y-4">
            <a href="{{ route('admin.categories.index') }}" class="block hover:text-blue-600 font-medium">Book Categories</a>
            <a href="{{ route('admin.books.index') }}" class="block hover:text-blue-600 font-medium">Book List</a>
           <a href="{{ route('admin.users.index') }}" class="block hover:text-blue-600 font-medium">Users</a>
           <a href="{{ route('admin.orders.index') }}" class="block hover:text-blue-600 font-medium">Orders</a>

        </aside>

        {{-- Page Content --}}
        <main class="flex-1 p-6">
            @yield('content')
        </main>
    </div>

</body>
</html>
