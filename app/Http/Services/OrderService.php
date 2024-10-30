<?php

namespace App\Http\Services;
use App\Models\Order;
use App\Models\Resturant;
use App\Http\Traits\PriceTrait;
use App\Http\Controllers\FirebaseController;
use Illuminate\Support\Facades\DB;
use App\Models\User;
class OrderService
{
    use PriceTrait;
    private $order;
    private $firebaseController;
    public function __construct(Order $order , FirebaseController $firebaseController){
        $this->order = $order;
        $this->firebaseController = $firebaseController;
    }

    public function index(){
        $orders = $this->order->with('resturant')
        ->where(function($q){
            $user = User::where('email' , session('email'))->first();
            if($user->user_type=='customer'){
                $q->where('user_email' , $user->email);
            }
        })
        ->paginate(10);
        return view('Dashboard.Orders.index' , compact('orders'));
    }

    public function create(){
        $resturants = Resturant::all();
        return view('Dashboard.Orders.create' , compact('resturants'));

    }

    public function store($request){
        $orderData = $request->all();
        DB::beginTransaction();
            $items = $this->getOrderPrice($orderData['items']);
            $order = $this->order->create([
                'user_email'=>session('email'),
                'total'=>$items['totalPrice'],
                'status'=>'submitted',
                'resturant_id'=>$orderData['resturant_id'],
            ]);
            $orderItems = $order->orderItems()->saveMany($items['items']);
            if($order && $orderItems){
                $this->firebaseController->changeOrderStatus($order);
                DB::commit();
                return redirect(route('orders.index'));
            }else{
                DB::rollBack();
                return redirect()->back()->with('message','An Error Happend Pls try Again');
            }
    }
    
    public function delete(){

    }
}

