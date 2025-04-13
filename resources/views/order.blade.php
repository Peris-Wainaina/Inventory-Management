@extends('dashboard')

@section('content')
    <h2>Orders</h2>
    <table>
        <tr>
            <th>Item Name</th>
            <th>Quantity</th>
            <th>Order Date</th>
            <th>Ordered By</th>
            <th>Department</th>
        </tr>
        @foreach($orders as $order)
            <tr>
                <td>{{ $order->item_name }}</td>
                <td>{{ $order->quantity }}</td>
                <td>{{ $order->created_at->format('Y-m-d H:i') }}</td>
                <td>{{ $order->user->name ?? 'N/A' }}</td>
                <td>{{ $order->user->department ?? 'N/A' }}</td>
            </tr>
        @endforeach
    </table>
@endsection
