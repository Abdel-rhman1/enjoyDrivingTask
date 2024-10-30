<?php

namespace App\Http\Services;
use App\Models\Order;
use App\Models\Resturant;
use App\Http\Traits\PriceTrait;
use Illuminate\Support\Facades\DB;
class OrderService
{

    use PriceTrait;
    private $order;
    public function __construct(Order $order){
        $this->order = $order;
    }

    public function index(){
        $orders = $this->order->with('resturant')->paginate(10);
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
                'resturant_id'=>$orderData['resturant_id'],
            ]);
            $orderItems = $order->orderItems()->saveMany($items['items']);
            if($order && $orderItems){
                DB::commit();
                return redirect(route('orders.index'));
            }else{
                DB::rollBack();
                return redirect()->back()->with('message','An Error Happend Pls try Again');
            }
    }

    
    public function delete(){

    }

    public function updateOrderStatus(){

    }
}

