<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    use HasFactory;
    public function attributes()
    {
        return $this->hasMany(PizzaAttribute::class);
    }
    public function toppings()
    {
        return $this->hasMany(Topping::class);
    }
}
