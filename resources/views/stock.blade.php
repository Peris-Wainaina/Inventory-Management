@extends('dashboard')

@section('content')
    <h2>Stock Management</h2>

    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @elseif(session('error'))
        <div style="color: red;">{{ session('error') }}</div>
    @endif

    <table>
        <thead>
            <tr>
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
                <tr>
                    <td>{{ $item->item_name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td class="sep">
                        
                        <form action="{{ route('stationery.addStock', $item->id) }}" method="GET">
                            @csrf
                            <button  class="btn1" type="submit">Add Stock</button>
                        </form>
                        <form action="{{ route('stock.reduce', ['id' => $item->id, 'quantity' => 1]) }}" method="POST">
                            @csrf
                            <button class="btn2" type="submit">Reduce Stock</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection