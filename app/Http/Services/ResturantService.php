<?php

namespace App\Http\Services;

use App\Models\Resturant;

class ResturantService
{

    private $resturant;
    public function __construct(Resturant $resturant)
    {
        $this->resturant = $resturant;
    }

    public function index($request)
    {
        $requestData = $request->all();
        $resturants = $this->resturant->where(function ($q) use ($requestData) {
            if (isset($requestData['name'])) {
                $q->where('name', 'like', '%' . $requestData['name']);
            }
        })->paginate(10);

        return view('Dashboard.Resturent.index', compact('resturants'));
    }


    public function create()
    {
        return view('Dashboard.Resturent.create');
    }

    public function store($request)
    {
        $data  = $request->except('_token');
        $resturant = $this->resturant->create($data);
        if ($resturant) {
            return redirect(route('resturants.index'));
        }
    }
    public function edit($id)
    {
        $resturant = $this->resturant->find($id);
        if ($resturant) {
            return view('Dashboard.Resturent.edit', compact('resturant'));
        } else {
            // dd('Not Found');
        }
    }

    public function update($request)
    {
        $data  = $request->except('_token');
        $id = $request['id'];
        $resturant = $this->resturant->where('id', $id)->update($data);
        if ($resturant) {
            return redirect(route('resturants.index'));
        }
    }

    public function delete($id)
    {
        $resturant = $this->resturant->find($id);
        if ($resturant) {
            $resturant->delete();
            return redirect(route('resturants.index'));
        } else {
            // dd('Not Found');
        }
    }

    public function map(){
        $resturants = $this->resturant->all();
        return view('Dashboard.Resturent.map', compact("resturants"));
    }
}
