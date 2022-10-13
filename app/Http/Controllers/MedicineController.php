<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\Stock;
use Illuminate\Http\Request;
use Auth;

class MedicineController extends Controller
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

        // fetching all the medicines data with their stock information and returning with the view
        $medicines = Medicine::join('stocks', function($join){
            $join->on('stocks.stock_medicine_id', '=', 'medicine_id');
        })->get();

        $serial = 1;

        return view('medicines.index', compact('medicines', 'serial'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // if user is a guest/not authenticated/session is not set then redirect back to login page
        if(Auth::guest()){
            return redirect()->route('login');
        }
        //
        return view('medicines.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if user is a guest/not authenticated/session is not set then redirect back to login page
        if(Auth::guest()){
            return redirect()->route('login');
        }
        //
        $medicine = Medicine::create([
            'medicine_name' => $request->input('medicineName'),
            'medicine_type' => $request->input('medicineType'),
            'medicine_dose' => $request->input('medicineDose'),
            'medicine_price' => $request->input('medicinePrice'),
            'medicine_expiry_date'=> $request->input('medicineExpiry'),
            'medicine_company_name' => $request->input('medicineCompany')
        ]);

        // echo $medicine; returns the inserted row

        // $medicineID = Medicine::max('medicine_id');

        // echo $medicineID;

        Stock::create([
            'stock_quantity' => $request->input('medicineStock'),
            'stock_cost_price' => $request->input('medicineStockCost'),
            // 'stock_medicine_id' => $medicineID
            'stock_medicine_id' => $medicine->medicine_id
        ]);

        return redirect()->route('medicine.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function show(Medicine $medicine)
    {
        // if user is a guest/not authenticated/session is not set then redirect back to login page
        if(Auth::guest()){
            return redirect()->route('login');
        }

        // this is row of all data of that medicine from medicines table
        // echo $medicine;

        // taking only the id of that medicine and joining the stocks tale with the medicine table for that medicine only 
        $medicineID = $medicine->medicine_id;

        // echo $medicineID;

        // fetching the medicine data with its stock information and returning with the view
        $medicineDetails = Medicine::join('stocks', function($join) use($medicineID){
            $join->on('stocks.stock_medicine_id', '=', 'medicine_id')
            ->where('stocks.stock_medicine_id', '=', $medicineID);
        })->get();

        // echo $medicineDetails;

        return view('medicines.show', compact('medicineDetails'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function edit(Medicine $medicine)
    {
        // if user is a guest/not authenticated/session is not set then redirect back to login page
        if(Auth::guest()){
            return redirect()->route('login');
        }

        // returning the medicines/edit view with medicine data through route model binding
        return view('medicines.edit', compact('medicine'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medicine $medicine)
    {
        // if user is a guest/not authenticated/session is not set then redirect back to login page
        if(Auth::guest()){
            return redirect()->route('login');
        }
        //
        $medicine->update([
            'medicine_name' => $request->input('medicineName'),
            'medicine_type' => $request->input('medicineType'),
            'medicine_dose' => $request->input('medicineDose'),
            'medicine_price' => $request->input('medicinePrice'),
            'medicine_expiry_date'=> $request->input('medicineExpiry'),
            'medicine_company_name' => $request->input('medicineCompany')
        ]);

        return redirect()->route('medicine.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medicine $medicine)
    {
        // if user is a guest/not authenticated/session is not set then redirect back to login page
        if(Auth::guest()){
            return redirect()->route('login');
        }
        //
        $medicine->destroy();

        return redirect()->route('medicine.index');
    }
}
