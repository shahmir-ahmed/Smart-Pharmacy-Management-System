<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Stock;
use App\Models\Sale;
use App\Models\Medicine;
use Auth;

class ReportController extends Controller
{
    
    public function stockIndex(){
        // if user is a guest/not authenticated/session is not set then redirect back to login page
        if(Auth::guest()){
            return redirect()->route('login');
        }

        $medicines  = Medicine::all();

        return view('stock_report.index', compact('medicines'));

    }

    // controls the stock report
    public function stockReport(Medicine $medicine){

        // if user is a guest/not authenticated/session is not set then redirect back to login page
        if(Auth::guest()){
            return redirect()->route('login');
        }

        // $createdAt = $request()->input('createdAt');

        // $stockReport = Stock::where('created_at', $createdAt)->get();

        // return view('')

        // echo $medicine;

        // echo($medicine->medicine_id);

        $medicineId = $medicine->medicine_id;

        $medicineStock = Medicine::join('stocks', function($join) use($medicineId){
            $join->on('stocks.stock_medicine_id', '=','medicine_id')
            ->where('medicine_id', $medicineId);
        })->get();

        // var_dump($medicineStock);

        return view('stock_report.report', compact('medicineStock'));
    }

    // controls the sales report
    public function salesIndex(){

        // if user is a guest/not authenticated/session is not set then redirect back to login page
        if(Auth::guest()){
            return redirect()->route('login');
        }

        $medicines  = Medicine::all();

        return view('sales_report.index', compact('medicines'));

    }

    // controls the sales report
    public function salesReport(Medicine $medicine){

        // if user is a guest/not authenticated/session is not set then redirect back to login page
        if(Auth::guest()){
            return redirect()->route('login');
        }

        $medicineId = $medicine->medicine_id;

        $medicineSales = Medicine::join('sales', function($join) use($medicineId){
            $join->on('sales.sale_medicine_id', '=','medicine_id')
            ->where('medicine_id', $medicineId);
        })->get();

        return view('sales_report.report', compact('medicineSales'));
    }
}
