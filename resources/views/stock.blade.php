@extends('dashboard')

@section('content')
    <h2>Stock Management</h2>

    @if(session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div style="color: red;">
            {{ session('error') }}
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($stock as $item)
                <tr>
                    <td>{{ $item->stationery->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>
                        <form action="{{ route('stock.reduce', ['id' => $item->id, 'quantity' => 1]) }}" method="POST">
                            @csrf
                            <button type="submit">Reduce Stock</button>
                        </form>
                        <form action="{{ route('stationery.addStock', $item->stationery->id) }}" method="GET">
                            @csrf
                            <button type="submit">Add Stock</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection