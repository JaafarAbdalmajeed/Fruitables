<?php

namespace App\Models;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'description', 'image', 'price', 'quantity', 'subcategory_id',
    ];

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }


}
