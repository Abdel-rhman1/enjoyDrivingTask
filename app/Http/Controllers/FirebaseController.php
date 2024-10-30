<?php

namespace App\Http\Controllers;

use App\Http\Services\FirebaseService;
use Illuminate\Http\Request;

class FirebaseController extends Controller
{
    protected $firebase;

    public function __construct(FirebaseService $firebase)
    {
        $this->firebase = $firebase->getDatabase();
    }

    public function changeOrderStatus($order){
        // dd($order->status);
        $reference = $this->firebase->getReference('Orders/'.$order->id);
        $reference->set(['status'=>$order->status]);
        //return response()->json($data);
    }
}

