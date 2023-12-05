@extends('layouts.app')

@section('content')
<div class="wrapper pizza-details">
    <h1>Order for {{$pizza->name}}</h1>
    <p class="type"> Type - {{$pizza->type}}</p>
    <p class="name"> Base - {{$pizza->base}}</p>
    <p class="toppings"> Extra toppings:</p>
    <ul>
        @foreach($pizza->toppings as $topping)
            <li>{{$topping}}</li>
        @endforeach
    </ul>
    <form action="{{ route('pizza.destroy',$pizza->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button>Complete Order</button>
    </form>

    <form action="{{ route('pizza.update',$pizza->id) }}" method="GET">
        <!-- @csrf
        @method('UPDATE') -->
        <button>Update Order</button>
    </form>
</div>
<a href="/pizza" class="back"><- Back to all pizzas</a>
@endsection