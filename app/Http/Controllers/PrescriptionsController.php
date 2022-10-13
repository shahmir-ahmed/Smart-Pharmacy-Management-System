<?php

namespace App\Http\Controllers;

use App\Models\Prescription;
use App\Models\Sale;
// use App\Models\Customer;
use Illuminate\Http\Request;
use Auth;

class PrescriptionsController extends Controller
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
        // $prescriptions = Prescription::join('customers', function($join){
        //     $join->on('customers.customer_id', '=', 'prescription_customer_id');
        // })->get();

        $prescriptions = Prescription::all();

        // var_dump($prescriptions);
        $serial = 1;

        return view('prescriptions.index', compact('prescriptions', 'serial'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Precription  $precription
     * @return \Illuminate\Http\Response
     */
    public function show(Prescription $prescription)
    {
        // if user is a guest/not authenticated/session is not set then redirect back to login page
        if(Auth::guest()){
            return redirect()->route('login');
        }
        // select sales on the prescription
        // $medicinesPurchased = Sale::where('sale_prescription_id', $prescription->prescription_id)->get();

        $prescriptionId = $prescription->prescription_id;

        $medicinesPurchased = Sale::join('medicines', function($join) use($prescriptionId){
            $join->on('medicines.medicine_id', '=', 'sale_medicine_id')
            ->where('sales.sale_prescription_id', $prescriptionId);
        })->get();

        // var_dump($medicinesPurchased);

        return view('prescriptions.show', compact('prescription', 'medicinesPurchased'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Precription  $precription
     * @return \Illuminate\Http\Response
     */
    public function edit(Prescription $prescription)
    {
        // if user is a guest/not authenticated/session is not set then redirect back to login page
        if(Auth::guest()){
            return redirect()->route('login');
        }
        //
        
        // echo $prescriptionId = $prescription->prescription_id;
        
        // $customerId = $prescription->customer_id;

        // $prescriptions = Prescription::join('customers', function($join) use($prescriptionId){
        //     $join->on('customers.customer_id', '=', 'prescription_customer_id')
        //     // ->where('prescription_id', $prescriptionId);
        //     ->where('prescription_customer_id', $customerId);
        // })->get();

        return view('prescriptions.edit', compact('prescription'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Precription  $precription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prescription $prescription)
    {
        // if user is a guest/not authenticated/session is not set then redirect back to login page
        if(Auth::guest()){
            return redirect()->route('login');
        }
        // updating customer as well as prescription record

        // problem in updation beacuse there is no customer id to update so I merged both the table to work on a singl etbale // issue of updating the data was resolved but the sale sinvoice inout of data reusability was conflicting so kept this solution

        // $customerId = $precription->customer_id;

        // Customer::update([
        //     'customer_name' => $request->input('customerName')
        // ])->where('customer_id', $customerId);

        // Prescription::update([
        //     'prescription_prescribed_by' => $request->input('prescriptionPrescribedBy'),
        //     'prescription_disease' => $request->input('prescriptionDisease')
        // ]);

        // echo($prescription);

        $prescription->update([
            'patient_name' => $request->input('customerName'),
            'patient_age' => $request->input('customerAge'),
            'prescription_prescribed_by' => $request->input('prescriptionPrescribedBy'),
            'prescription_disease' => $request->input('prescriptionDisease')
        ]);

        return redirect()->route('prescription.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Precription  $precription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prescription $prescription)
    {
        // if user is a guest/not authenticated/session is not set then redirect back to login page
        if(Auth::guest()){
            return redirect()->route('login');
        }
        
        $prescription->delete();

        return redirect()->route('prescription.index');
    }
}
