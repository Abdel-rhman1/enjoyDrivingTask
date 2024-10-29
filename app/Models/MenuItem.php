<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Resturant;

class MenuItem extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function resturant(){
        return $this->belongsTo(Resturant::class , 'resturant_id' , 'id');
    }
}
