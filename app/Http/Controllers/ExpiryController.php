<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;
use Auth;

class ExpiryController extends Controller
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
        $medicines = Medicine::all();

        $serial = 1;

        return view('medicine_expiry.index', compact('medicines', 'serial'));
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
        // If the staff wants to view specific medicine details
        return view('medicine.show', compact('medicine'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function edit(Medicine $medicineExpiry) // route model type hinting variable name changed beacuse the route link expects the same variable name in the paramter as the route placeholder name in url i.e. /medicineExpiry/{$medicineExpiry}/edit
    
    // For route binding to work, your type-hinted variable name must match the route placeholder name
    {
        //

        // print_r( $medicine);
        // echo ($expiry);

        // $medicineoo = $medicine->where('medicine_id', $medicine);

        // var_dump( $medicineoo);
        // echo $medicineExpiry;

        // if user is a guest/not authenticated/session is not set then redirect back to login page
        if(Auth::guest()){
            return redirect()->route('login');
        }
        return view('medicine_expiry.edit', compact('medicineExpiry'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medicine $medicineExpiry)
    {
        // if user is a guest/not authenticated/session is not set then redirect back to login page
        if(Auth::guest()){
            return redirect()->route('login');
        }
        //
        $medicineExpiry->update([
            'medicine_expiry_date' => $request->input('medicineExpiry')
        ]);

        return redirect()->route('medicineExpiry.index');
    }
}
