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

    public function search(Request $request)
    {
        if(isset($request->keyword)){
            $stocks = Stock::where('name', 'LIKE', "%$request->keyword%")->orderBy('updated_at', 'DESC')->paginate(1)->appends(['keyword' => $request->keyword]);
        }else{
            $stocks = Stock::orderBy('updated_at', 'DESC')->paginate(1);
        }

        return view('stocks/index')->with(['stocks' => $stocks]);
    }

    public function mycart()
    {
        $user = auth()->user();
        
        return view('stocks.mycart', ['user' => $user]);
    }
    
    public function store(Request $request, Stock $stock)
    {
        $user = auth()->user();
        $buyCount = $request->input('buycounts');

        //在庫数から購入数を減算&保存
        $stock->stock_count -= $buyCount;
        $stock->save();

        $buyStocks = Stock::whereHas('users', function($query) use($stock, $user){
            $query->where('stock_user.stock_id', $stock->id)
                  ->where('stock_user.user_id', $user->id);
        })->first();

        if(isset($buyStocks)){
            $currentInfo = $stock->users($user->id)->first()->pivot->buy_count;
            $stock->users()->updateExistingPivot($user->id, ['buy_count' => $currentInfo + $buyCount]);
        }else{
            $stock->users()->attach($user->id, ['buy_count' => $buyCount]);
        }
        
        return response()->json(['redirect_url' => route('mycart'), 'message' => 'カートに追加されました！']);
    }
}
