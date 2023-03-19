<?php

namespace App\Http\Controllers\DashbordController;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductEditRequest;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\ProductStore;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function create()
    {
        $stores =  Store::all();
        return view('cms.product.create')->with('stores', $stores);
    }


    public function store(ProductRequest $request)
    {
        $image = $request->file('image');
        $path = 'uploads/images/';
        $image_name = time() + rand(1,  1000000000) . "." . $image->getClientOriginalExtension();
        Storage::disk('local')->put($path . $image_name, file_get_contents($image));

        $prodeut_name =  $request['name'];
        $description =  $request['description'];
        $base_price =  $request['base_price'];
        $discount_price =  $request['discount_price'];
        $store_id = $request['store_id'];
        $flag = 0;
        if ($discount_price >  0) {
            $flag = 1;
        }
        $product =  new Product();
        $product->name =  $prodeut_name;
        $product->description =  $description;
        $product->base_price = $base_price;
        $product->store_id = $store_id;
        $product->discount_price = $discount_price;
        $product->flag = $flag;
        $product->image =  $path .  $image_name;
        $result =  $product->save();
        return redirect()->back()->with('add_states', $result);
    }

    public function index()
    {
        $prodects =  Product::with('store')->get();

        foreach ($prodects as $prodect) {
            $image_link =  Storage::url($prodect->image);
            $prodect->image = $image_link;
        }
        return view('cms.product.index')->with('prodects', $prodects);
    }




    public function edit($id)
    {
        // $store = Store::find($id);
        $prodect = Product::with('store')->where('id', $id)->first();
        $image_link =  Storage::url($prodect->image);
        $prodect->image = $image_link;
        $stores  =  Store::all();
        // dd($prodect->toArray());
        return view('cms.product.edit')->with('prodect', $prodect)->with('stores', $stores);
    }

    public function update(ProductEditRequest $request, $id)
    {
        $product =  Product::where('id', $id)->first();

        $prodeut_name =  $request['name'];
        $description =  $request['description'];
        $base_price =  $request['base_price'];
        $discount_price =  $request['discount_price'];
        $store_id = $request['store_id'];
        $flag = 0;
        if ($discount_price >  0) {
            $flag = 1;
        }
        //? update in DB
        $product->name =  $prodeut_name;
        $product->description =  $description;
        $product->base_price = $base_price;
        $product->store_id = $store_id;
        $product->discount_price = $discount_price;
        $product->flag = $flag;

        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $path = 'uploads/images/';
            $name = time() + rand(1,  1000000000) . "." . $image->getClientOriginalExtension();
            Storage::disk('local')->put($path . $name, file_get_contents($image));
            $product->image = $path . $name;
        }
        $product->save();
        return redirect()->back();
    }

    public function destroy($id)
    {
        //softDelete
        Product::where('id', $id)->delete();
        return redirect()->back();
    }
}