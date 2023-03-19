<?php

namespace App\Http\Controllers\DashbordController;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEditRequest;
use App\Http\Requests\StoreRequest;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class StoreController extends Controller
{

    public function create()
    {
        return view('cms.store.create');
    }



    public function store(StoreRequest $request)
    {

        $logo = $request->file('logo');
        $path = 'uploads/logos/';
        $name = time() + rand(1,  1000000000) . "." . $logo->getClientOriginalExtension();
        Storage::disk('local')->put($path . $name, file_get_contents($logo));
        $state =    Storage::disk('local')->exists($path, $name);


        //? sotre in DB
        $store_name = $request['name'];
        $address = $request['address'];

        $store =  new Store();
        $store->name = $store_name;
        $store->address =   $address;
        $store->logo = $path . $name;
        // dd($name);
        $result =   $store->save();
        return redirect()->back()->with('add_states', $result,);
    }




    

    public function index(Request $request)
    {
        $stores =  Store::all();
        foreach ($stores as $store) {
            $logo_link = Storage::url($store->logo);
            $store->logo =  $logo_link;
        }
        // dd($stores->toArray());
        return view('cms.store.index')->with('stores', $stores);
    }







    public function edit($id)
    {
        // $store = Store::find($id);
        $store = Store::where('id', $id)->first();
        $logo_link = Storage::url($store->logo);
        $store->logo =  $logo_link;
        // dd($store->toArray());
        return view('cms.store.edit')->with('store', $store);
    }

    public function update(StoreEditRequest $request, $id)
    {
        $store_name = $request['name'];
        $address = $request['address'];

        $store = Store::where('id', $id)->first();
        $store->name = $store_name;
        $store->address =   $address;

        if ($request->hasFile('logo')) {

            $logo = $request->file('logo');
            $path = 'uploads/logos/';
            $name = time() + rand(1,  1000000000) . "." . $logo->getClientOriginalExtension();
            Storage::disk('local')->put($path . $name, file_get_contents($logo));
            $store->logo = $path . $name;
        }


        $store->save();
        return redirect()->back();
    }


    public function destroy($id)
    {
        //softDelete
        Store::where('id', $id)->delete();
        return redirect()->back();
    }
}