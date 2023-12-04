@extends('layouts.app')

@section('content')
<div class="wrapper pizza-index">   
    <h1>Pizza Orders</h1>         
    @foreach($pizzas as $pizza)
        <div class="pizza-item">
            <img src="/img/pizza.jpeg" alt="pizza icon">
            <h4><a href="/pizza/{{ $pizza->id }}">{{$pizza->name}}</a></h4>
        </div>
        <!-- - {{$pizza->type}} - {{$pizza->base}} -->
    @endforeach
</div>            
@endsection