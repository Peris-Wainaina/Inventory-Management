@extends('dashboard')

@section('content')
    <h2>Add Stock for {{ $stationery->item_name }}</h2>

    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @elseif(session('error'))
        <div style="color: red;">{{ session('error') }}</div>
    @endif

    <form action="{{ route('stationery.addStock', $stationery->id) }}" method="POST">
        @csrf
        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" min="1" required>

        <button type="submit">Add</button>
    </form>
@endsection