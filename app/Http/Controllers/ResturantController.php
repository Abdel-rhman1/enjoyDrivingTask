<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ResturantRequest;
use App\Http\Services\ResturantService;
class ResturantController extends Controller
{
    private $resturantService;
    public function __construct(ResturantService $resturantService)
    {
        $this->resturantService = $resturantService;   
    }

    public function index(Request $request){
       return $this->resturantService->index($request);
    }

    public function create(){
        return $this->resturantService->create();
    }

    public function store(ResturantRequest $request){
        return $this->resturantService->store($request);

    }

    public function edit($id){
        return $this->resturantService->edit($id);

    }

    public function update(ResturantRequest $request){
        return $this->resturantService->update($request);
    }

    public function delete($id){
        return $this->resturantService->delete($id);
    }

    public function map(){
        return $this->resturantService->map();
    }
}
