<?php

namespace App\Http\Controllers\PublicWbController;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\PurchaseTransaction;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PublicController extends Controller
{

    public function home()
    {
        $stores =  Store::all();
        foreach ($stores as $store) {
            $logo_link = Storage::url($store->logo);
            $store->logo =  $logo_link;
        }
        // dd($stores->toArray());
        return view('publicWeb.home')->with('stores', $stores);
    }

    public function showProduct($id)
    {
        $store_id =  $id;
        $products =  Product::where('store_id', $id)->with('store')->get();
        foreach ($products as $product) {
            $image_link = Storage::url($product->image);
            $product->image =  $image_link;
        }

        return view('publicWeb.products')->with('products', $products)->with('store_id', $store_id);
    }



    public function shwoProductDetails($id)
    {
        $product = Product::where('id', $id)->first();
        $logo_link = Storage::url($product->image);
        $product->image =  $logo_link;
         return view('publicWeb.productdetails')->with('product', $product);
    }


    public function purchaseTransactio($id)
    {
        $status = false;
        $product_name = '';
        $store_name = '';
        $price = 0;
        $product =  Product::where('id', $id)->with('store')->first();
        foreach ($product as $val) {
            $product_name = $product->name;
            $store_name =  $product->store->name;

            if ($product->flag == 1) {
                $price = $product->base_price - ($product->base_price * ($product->discount_price / 100));
            } else {
                $price = $product->base_price;
            }
        }
        $purchaseTransaction =  new PurchaseTransaction();
        $purchaseTransaction->product_name = $product_name;
        $purchaseTransaction->store_name = $store_name;
        $purchaseTransaction->purchasing_price =  $price;
        $status =  $purchaseTransaction->save();
        return redirect()->back()->with('status', $status);
    }

    
    public function seach(Request $request,  $store_id)
    {
        $searchValue =  $request['search'];
        $products =  Product::where('name', 'LIKE', "%{$searchValue}%")
            ->where('store_id', $store_id)
            ->get();
        foreach ($products as $product) {
            $logo_link = Storage::url($product->image);
            $product->image =  $logo_link;
        }
        return view('publicWeb.searchPreduct')->with('products', $products);
    }
}