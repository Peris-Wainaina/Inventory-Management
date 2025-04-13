@extends('dashboard')

@section('content')
@if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @elseif(session('error'))
        <div style="color: red;">{{ session('error') }}</div>
    @endif
<div class="stat">
    <div class="demo">
    <h3>Pens</h3>
    <img src="{{ asset('images/pens1.jpg') }}" alt="pens" width="150">
    <form action="{{ route('stationery.order') }}" method="POST" >
        @csrf
        <input type="hidden" name="stationery_id" value="1" />
        <input type="number" name="quantity" placeholder="1"/><br><br>
        <button>Order</button>
    </form>
</div>
<div class="demo">
    <h3>Photocopying Papers</h3>
    <img src="{{ asset('images/photocopy.jpeg') }}" alt="photocopying papers" width="150">
    <form action="{{ route('stationery.order') }}" method="POST">
       @csrf
       <input type="hidden" name="stationery_id" value="2" />
        <input type="number" name="quantity" placeholder="1"/><br><br>
        <button>Order</button>
    </form>
</div>
<div class="demo">
    <h3>Paper Clips</h3>
    <img src="{{ asset('images/clips.jpeg') }}" alt="paperclips" width="150">
    <form action="{{ route('stationery.order') }}" method="POST">
         @csrf
         <input type="hidden" name="stationery_id" value="3" />
        <input type="number" name="quantity"  placeholder="1"/><br><br>
        <button>Order</button>
    </form>
</div>
<div class="demo">
    <h3>Staple Pins</h3>
    <img src="{{ asset('images/staple.jpeg') }}" alt="staplepins" width="150">
    <form action="{{ route('stationery.order') }}" method="POST">
          @csrf
        <input type="hidden" name="stationery_id" value="4" />
        <input type="number" name="quantity"  placeholder="1"/><br><br>
        <button>Order</button>
    </form>
</div>
<div class="demo">
    <h3>Note Books</h3>
    <img src="{{ asset('images/notes3.jpg') }}" alt="notebooks" width="170" height="150">
    <form action="{{ route('stationery.order') }}" method="POST">
         @csrf
         <input type="hidden" name="stationery_id" value="5" />
        <input type="number" name="quantity" placeholder="1"/><br><br>
        <button>Order</button>
    </form>
</div>
<div class="demo">
    <h3>Box Files</h3>
    <img src="{{ asset('images/boxfile.jpeg') }}" alt="boxfile" width="150">
    <form action="{{ route('stationery.order') }}" method="POST">
         @csrf
         <input type="hidden" name="stationery_id" value="6" />
        <input type="number" name="quantity" placeholder="1"/><br><br>
        <button>Order</button>
    </form>
</div>
<div class="demo">
    <h3>Spring Files</h3>
    <img src="{{ asset('images/spring.jpeg') }}" alt="springfile" width="150" height="150">
    <form action="{{ route('stationery.order') }}" method="POST">
      @csrf
      <input type="hidden" name="stationery_id" value="7" />
        <input type="number" name="quantity" placeholder="1"/><br><br>
        <button>Order</button>
    </form>
</div>
<div class="demo">
    <h3>Glue Stick</h3>
    <img src="{{ asset('images/glue.jpeg') }}" alt="gluestick" width="170">
    <form action="{{ route('stationery.order') }}" method="POST">
        @csrf
        <input type="hidden" name="stationery_id" value="8" />
        <input type="number" name="quantity" placeholder="1"/><br><br>
        <button>Order</button>
    </form>
</div>
<div class="demo">
    <h3>White Out</h3>
    <img src="{{ asset('images/out.jpeg') }}" alt="whiteout" width="150">
    <form action="{{ route('stationery.order') }}" method="POST">
       @csrf
       <input type="hidden" name="stationery_id" value="9" />
        <input type="number" name="quantity" placeholder="1"/><br><br>
        <button>Order</button>
    </form>
</div>
<div class="demo">
    <h3>Envelopes</h3>
    <img src="{{ asset('images/envelope.jpeg') }}" alt="envelope" width="150">
    <form action="{{ route('stationery.order') }}" method="POST">
        @csrf
        <input type="hidden" name="stationery_id" value="10" />
        <input type="number" name="quantity" placeholder="1"/><br><br>
        <button>Order</button>
    </form>
</div>
<div class="demo">
    <h3>Loose Leaf Pad
    </h3>
    <img src="{{ asset('images/download.jpeg') }}" alt="looseleaf" width="170">
    <form action="{{ route('stationery.order') }}" method="POST">
        @csrf
        <input type="hidden" name="stationery_id"  value="11" />
        <input type="number" name="quantity" placeholder="1"/><br><br>
        <button>Order</button>
    </form>
</div>
<div class="demo">
    <h3>Pencils
    </h3>
    <img src="{{ asset('images/pencil.jpeg') }}" alt="pencil" width="170">
    <form action="{{ route('stationery.order') }}" method="POST">
        @csrf
        <input type="hidden" name="stationery_id"  value="12" />
        <input type="number" name="quantity" placeholder="1"/><br><br>
        <button>Order</button>
    </form>
</div>
</div>
@endsection