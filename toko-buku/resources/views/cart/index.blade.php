@extends('layouts.app') {{-- atau layout usermu --}}

@section('content')
<h2 class="text-2xl font-bold mb-4">Your Cart</h2>

@if(session('success'))
<div class="bg-green-100 p-3 rounded mb-4 text-green-700">
    {{ session('success') }}
</div>
@endif

<table class="w-full bg-white rounded shadow text-sm">
    <thead class="bg-blue-100">
        <tr>
            <th class="py-2 px-4">Book</th>
            <th class="py-2 px-4">Qty</th>
            <th class="py-2 px-4">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($carts as $cart)
        <tr>
            <td class="px-4 py-2">{{ $cart->book->title }}</td>
            <td class="px-4 py-2">{{ $cart->quantity }}</td>
            <td class="px-4 py-2">
                <form method="POST" action="{{ route('cart.destroy', $cart->id) }}">
                    @csrf @method('DELETE')
                    <button class="text-red-600">Remove</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{-- Place Order button --}}
<form action="{{ route('orders.store') }}" method="POST" class="mt-6">
    @csrf
    <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
        Place Order
    </button>
</form>
@endsection
