<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\OrderService;
use App\Http\Requests\OrderRequest;
use App\Models\Resturant;
class OrderController extends Controller
{
    private $orderService;

    public function __construct(OrderService $orderService){
        $this->orderService = $orderService;
    }

    public function index(){
        return $this->orderService->index();
    }

    public function create(){
        return $this->orderService->create();
    }

    public function store(OrderRequest $request){
        return $this->orderService->store($request);
    }
   
    public function delete($id){
        return $this->orderService->delete($id);
    }
}
