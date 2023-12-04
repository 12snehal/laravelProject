@extends('layouts.app')

@section('content')
<div class="wrapper create-pizza">
    <h1>
        Create a New Pizza
    </h1>
    <form action="/pizza/updateData" method="POST">
        @csrf
        <input type="hidden" name="id" value={{ $pizza->id}} >
        <label for="name">Your name:</label>
            <input type="text" id="name" name="name" value={{ $pizza->name;}}>
        <label for="type">Choose pizza type:</label>
            <select name="type" id="type">
                <!-- <option value="">Select</option> -->
                <option value="margherita" @if ($pizza->type == "margherita") {{ 'selected' }} @endif >Margherita</option>
                <option value="hawaiian" @if ($pizza->type == "hawaiian") {{ 'selected' }} @endif>Hawaiian</option>
                <option value="veg supreme" @if ($pizza->type == "veg supreme") {{ 'selected' }} @endif>Veg supreme</option>
                <option value="volcano" @if ($pizza->type == "volcano") {{ 'selected' }} @endif>Volcano</option>
            </select>
        <label for="base">Choose base type:</label>
            <select name="base" id="base">
                <option value="cheesy crust" @if ($pizza->base == "cheesy crust") {{ 'selected' }} @endif >Cheesy crust</option>
                <option value="garlic crust" @if ($pizza->base == "garlic crust") {{ 'selected' }} @endif >Garlic crust</option>
                <option value="thin & crispy" @if ($pizza->base == "thin & crispy") {{ 'selected' }} @endif >Thin & crispy</option>
                <option value="thick" @if ($pizza->base == "thick") {{ 'selected' }} @endif >Thick</option>
            </select>  
        <fieldset>     
            <label for="toppings">Extra toppings:</label>
                <input type="checkbox" name="toppings[]" value="mushrooms" @if (in_array('mushrooms', $toppingArray)) {{'checked'}} @endif>Mushrooms<br/>
                <input type="checkbox" name="toppings[]" value="peppers" @if (in_array('peppers', $toppingArray)) {{'checked'}} @endif>Peppers<br/>
                <input type="checkbox" name="toppings[]" value="garlic" @if (in_array('garlic', $toppingArray)) {{'checked'}} @endif>Garlic<br/>
                <input type="checkbox" name="toppings[]" value="olive" @if (in_array('olive', $toppingArray)) {{'checked'}} @endif>Olive<br/>
                
        </fieldset>            
        <input type="submit" name="submit" value="Update Pizza">     
    </form>
</div>
@endsection