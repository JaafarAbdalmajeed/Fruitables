<?php

namespace App\Models;

use App\Models\User;
use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'fname',
        'lname
        address',
        'city',
        'country',
        'postcode',
        'mobile',
        'email',
        'order_note',
        'total_price',
        'status',
        'message',
        'tracking_no',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

}
