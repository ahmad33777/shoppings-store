<?php

namespace App\Http\Controllers\DashbordController;

use App\Http\Controllers\Controller;
use App\Models\PurchaseTransaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{


    public function index()
    {
        $transactions =  PurchaseTransaction::get();
        return view('cms.purchaseTransaction.purchaseTransaction')->with('transactions', $transactions);
    }



    public function report()
    {
        $currentTime = Carbon::now();
        $transactions =   DB::table('purchase_transactions')
            ->select([
                'product_name',
                DB::raw('sum(purchasing_price) as purchasing_price'),
            ])
            ->groupBy('product_name')->get();

        return view('cms.purchaseTransaction.purchaseTransactionReport')
            ->with('transactions', $transactions)
            ->with('currentTime', $currentTime);
    }
}