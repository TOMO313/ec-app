<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;

class StockController extends Controller
{
    public function index()
    {
        $stocks = Stock::orderBy('updated_at', 'DESC')->paginate(1);
        return view('stocks.index', ["stocks" => $stocks]);
    }
    
    public function store(Request $request, Stock $stock)
    {
        $user = auth()->user();
        $buyCount = $request->input('buyCount');

        $stock->users()->attach($user->id, ['buy_count' => $buyCount]);

        $stock->stock_count -= $buyCount;
        $stock->save();

        return view('stocks.mycart', ["user" => $user]);
    }
}
