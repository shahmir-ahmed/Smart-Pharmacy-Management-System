<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Medicine;
use Illuminate\Http\Request;
use Auth;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if user is a guest/not authenticated/session is not set then redirect back to login page
        if(Auth::guest()){
            return redirect()->route('login');
        }

        //
        $medicines = Medicine::join('stocks', function($join){
            $join->on('stocks.stock_medicine_id', '=', 'medicine_id');
        })->get();

        $serial = 1;

        return view('stock.index', compact('medicines', 'serial'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit(Medicine $medicineStock)
    {
        // if user is a guest/not authenticated/session is not set then redirect back to login page
        if(Auth::guest()){
            return redirect()->route('login');
        }

        // taking the id of the medicine and joining the stock table with medicine table
        $medicineId = $medicineStock->medicine_id;

        // echo $medicineId;

        $medicineStock = Medicine::join('stocks', function($join) use($medicineId){
            $join->on('stocks.stock_medicine_id', '=', 'medicine_id')
            ->where('stocks.stock_medicine_id' , $medicineId);
        })->get();

        // echo $stock;

        return view('stock.edit', compact('medicineStock'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stock $medicineStock)
    {
        // if user is a guest/not authenticated/session is not set then redirect back to login page
        if(Auth::guest()){
            return redirect()->route('login');
        }
        
        //
        // $medicineId = $medicineStock->medicine_id;

        // echo $medicineId;

        // echo $medicineStock;
        // updating the stock record in stocks table
        $medicineStock->update([
            'stock_quantity' => $request->input('medicineStock'),
            'stock_cost_price' => $request->input('medicineStockCost')
        ]);

        return redirect()->route('medicineStock.index');
    }

}
