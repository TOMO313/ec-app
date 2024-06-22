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
}
