<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cart;
class Product extends Model
{
    use HasFactory;
    protected $table ="product";
    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function carts()
    {
    return $this->hasMany(Cart::class, 'product_id');
    }
   
}
