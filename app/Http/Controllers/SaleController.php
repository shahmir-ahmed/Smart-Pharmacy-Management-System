<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;
use DB;
use Auth;

class SaleController extends Controller
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

        // joining sales with the medicine table
        $sales = Sale::join('medicines',function($join){
            $join->on('medicines.medicine_id', '=', 'sale_medicine_id');
        })->get();

        // $sales = DB::table('sales')
        // ->join('medicine.medicine_id', '=', 'sale_medicine_id')
        // ->Andon('prescriptions', 'prescriptions.prescription_id', '=', 'sales.prescription_id')
        // ->select

        $serial = 1;

        return view('sales.index', compact('sales', 'serial'));
    }

}
