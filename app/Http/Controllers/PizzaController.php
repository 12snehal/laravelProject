<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pizza;

class PizzaController extends Controller
{
    // public function __construct(){
    //     $this->middleware('auth');
    // }

    public function index(){
        // $pizza = [
        //     ['type'=>'hawaiian', 'base'=>'cheesy crust'],
        //     ['type'=>'valcano', 'base'=>'garlic crust'],
        //     ['type'=>'veg supreme', 'base'=>'thin & crispy']
        // ];

        // $pizza = Pizza::all(); 
        // $pizza = Pizza::orderBy('name','desc')->get();   
        // $pizza = Pizza::where('name','yoshi')->get();   
        $pizza = Pizza::latest()->get();   
        // foreach($pizza as $piz){
        // echo $piz;
        // }
        return view('pizzas.index',['pizzas'=>$pizza]);
    }

    public function show($id){
        $pizza = Pizza::findOrfail($id);
        return view('pizzas.show',['pizza'=>$pizza]);
    }

    public function create(){
        return view('pizzas.create');
    }

    public function store(){
        $pizza = new Pizza();

        $pizza->name=request('name');
        $pizza->type=request('type');
        $pizza->base=request('base');
        $pizza->toppings = request('toppings');

        $pizza->save();
        // print_r($pizza);
        return redirect('/')->with('msg','Thanks for your order');
    }

    public function destroy($id){
        $pizza = Pizza::findOrFail($id);
        $pizza->delete();

        return redirect('/pizza');
    }

    public function update($id){
        $pizza = Pizza::findOrFail($id);
        $toppingArray = [];
        foreach($pizza->toppings as $topping){
            $toppingArray[] = $topping;
        }
        // print_r($toppingArray);
        return view('pizzas.updateForm',['pizza'=>$pizza,'toppingArray'=>$toppingArray]);
    }

    public function updateData()
    {
        // $pizza = new Pizza();
        $pizza = Pizza::where('id',request('id'))->update(array(
            'name'=>request('name'),
            'type'=>request('type'),
            'base'=>request('base'),
            'toppings' => request('toppings')
        )); 

        return redirect('/')->with('msg','Thanks');
    }
}
