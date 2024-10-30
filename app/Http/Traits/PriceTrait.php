<?php
namespace App\Http\Traits;
use App\Models\MenuItem;
use App\Models\OrderItems;
trait PriceTrait{

    public function getOrderPrice($items){
        $totalPrice = 0;
        $MenuItems = [];
        foreach($items['menuIds'] as $key=>$menuId){
            $price = MenuItem::find($menuId)->price;
            $quantity = $items['quantity'][$key];
            $totalPrice+=$price * $quantity;
            $MenuItems[$key] = new OrderItems(['itemId'=>$menuId , 'quantity'=>$quantity]);
            // $menuId;
            // $MenuItems[$key]['quantity'] = $quantity;

        }
        return ['totalPrice'=>$totalPrice , 'items'=>$MenuItems];
    }
}