<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use App\Models\Topping;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
     // Display a list of pizzas
     public function index()
     {
        //  $pizzas = Pizza::all();
         $pizzas = Pizza::with('attributes')->get();
         $toppings = Topping::all();
         return view('index', compact('pizzas','toppings'));
     }
 
     // Show the details of a specific pizza
     public function show($id)
     {
        //  $pizza = Pizza::findOrFail($id);
         $pizza = Pizza::with('attributes')->findOrFail($id);
 
         return view('pizzas.show', compact('pizza'));
     }
}
