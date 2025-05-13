@extends('dashboard')

@section('content')
    <h2>Order Status</h2>

    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @elseif(session('error'))
        <div style="color: red;">{{ session('error') }}</div>
    @endif

    @if($orders->isEmpty())
        <p>You have not placed any orders yet.</p>
    @else
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>Item</th>
                <th>Quantity</th>
                <th>Order Date</th>
                <th>Status</th>
            </tr>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->item_name }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>{{ $order->created_at->format('Y-m-d H:i') }}</td>
                    <td>
                    <span class="status-{{ $order->status }}">
                      {{ ucfirst($order->status) }}
                   </span>
                    </td>
                </tr>
            @endforeach
        </table>
    @endif
@endsection
