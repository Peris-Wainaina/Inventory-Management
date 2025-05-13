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
            <th>Status</th>
            <th>Actions</th>
        </tr>
        @foreach($orders as $order)
            <tr>
                <td>{{ $order->item_name }}</td>
                <td>{{ $order->quantity }}</td>
                <td>{{ $order->created_at->format('Y-m-d H:i') }}</td>
                <td>{{ $order->user->name ?? 'N/A' }}</td>
                <td>{{ $order->user->department ?? 'N/A' }}</td>
                <td>
                <span class="status-{{ $order->status }}">
                {{ ucfirst($order->status) }}
                   </span>
                <td>
                    @if($order->status === 'pending')
                        <form action="{{ route('orders.approve', $order->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button class="b2t" type="submit">Approve</button>
                        </form><br><br>

                        <form action="{{ route('orders.reject', $order->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button class="b3t" type="submit">Reject</button>
                        </form>
                    @else
                        {{ ucfirst($order->status) }}
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
@endsection
