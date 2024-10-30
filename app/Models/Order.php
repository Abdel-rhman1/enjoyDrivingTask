<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Resturant;
use App\Models\OrderItems;
class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function resturant(){
        return $this->belongsTo(Resturant::class , 'resturant_id' , 'id');
    }

    public function orderItems(){
        return $this->hasMany(OrderItems::class , 'id' , 'item_id');
    }
}
