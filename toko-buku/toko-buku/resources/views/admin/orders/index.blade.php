@extends('admin.dashboard')

@section('content')
<h2 class="text-2xl font-bold mb-4">Book Orders</h2>

<table class="w-full table-auto bg-white shadow rounded-lg">
    <thead class="bg-blue-100">
        <tr>
            <th class="px-4 py-2 text-left">User</th>
            <th class="px-4 py-2 text-left">Book</th>
            <th class="px-4 py-2 text-left">Quantity</th>
            <th class="px-4 py-2 text-left">Order Date</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
        <tr class="border-t">
            <td class="px-4 py-2">{{ $order->user->name }}</td>
            <td class="px-4 py-2">{{ $order->book->title }}</td>
            <td class="px-4 py-2">{{ $order->quantity }}</td>
            <td class="px-4 py-2">{{ $order->created_at->format('d M Y') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
