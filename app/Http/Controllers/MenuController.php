<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\MenuService;
use App\Http\Requests\MenuRequest;
class MenuController extends Controller
{
    private $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    public function index($resturantId){
        return $this->menuService->index($resturantId);
    }

    public function create(){
        return $this->menuService->create();
    }

    public function store(MenuRequest $request){
        return $this->menuService->store($request);
    }

    public function edit($id){
        return $this->menuService->edit($id);
    }

    public function update(MenuRequest $request){
        return $this->menuService->update($request);
    }

    public function delete($id){
        return $this->menuService->delete($id);
    }
}
