<?php

namespace App\Http\Services;

use App\Models\MenuItem;
use App\Models\Resturant;
class MenuService
{

    private $menu;
    public function __construct(MenuItem $menu)
    {
        $this->menu = $menu;
    }

    public function index($resturantId)
    {
        // dd($resturantId);
        $menus = $this->menu->where('resturant_id' , $resturantId)->with('resturant')->paginate(10);
        // dd($menus);
        return view('Dashboard.Menu.index', compact('menus' , 'resturantId'));
    }


    public function ajax($resturantId){
        $menus = $this->menu->where('resturant_id' , $resturantId)->get();
        return response()->json(['success'=>true,'data'=>$menus], 200);
    }

    public function create(){
        $resturants = Resturant::all();
        return view('Dashboard.Menu.create' , compact('resturants'));
    }

    public function store($request){
        $data  = $request->except('_token');
        $menu = $this->menu->create($data);
        if ($menu) {
            return redirect(route('menus.index', $data['resturant_id']));
        }
    }
    public function edit($id)
    {
        $menu = $this->menu->find($id);
        $resturants = Resturant::all();
        if ($menu) {
            return view('Dashboard.Menu.edit', compact('menu' , 'resturants'));
        } else {
            // dd('Not Found');
        }
    }

    public function update($request)
    {
        $data  = $request->except('_token' ,'menuId');
        $id = $request['menuId'];
        $menu = $this->menu->where('id', $id)->update($data);
        if ($menu) {
            return redirect(route('menus.index' , $data['resturant_id']));
        }
    }

    public function delete($id)
    {
        $menu = $this->menu->find($id);
        if ($menu) {
            $resturantId = $menu->resturant_id;
            $menu->delete();
            return redirect(route('menus.index' , $resturantId));
        } else {
            // dd('Not Found');
        }
    }
}
