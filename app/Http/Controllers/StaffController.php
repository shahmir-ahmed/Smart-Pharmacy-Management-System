<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use Auth;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // fetching all staff data
        $staffs = Staff::all();

        $serial = 1;

        // returning the staff/view with staff data and serial number
        return view('staff.index', compact('staffs', 'serial'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // returning staff/create view
        return view('staff.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // creating new record for staff
        Staff::create([
            'staff_name' => $request->input('staffName'),
            'staff_position' => $request->input('staffPosition'),
            'staff_salary' => $request->input('staffSalary'),
            'staff_contact' => $request->input('staffContact')
        ]);

        // redirecting to staff.index function
        return redirect()->route('staff.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function show(Staff $staff)
    {
        // if user is a guest/not authenticated/session is not set then redirect back to login page
        if(Auth::guest()){
            return redirect()->route('login');
        }
        //

        return view('staff.show', compact('staff'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function edit(Staff $staff)
    {
        // if user is a guest/not authenticated/session is not set then redirect back to login page
        if(Auth::guest()){
            return redirect()->route('login');
        }

        // returning view of staff/edit with staff details
        return view('staff.edit', compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Staff $staff)
    {
        // if user is a guest/not authenticated/session is not set then redirect back to login page
        if(Auth::guest()){
            return redirect()->route('login');
        }

        // updating the staff record through route model binding

        $staff->update([
            'staff_name' => $request->input('staffName'),
            'staff_position' => $request->input('staffPosition'),
            'staff_salary' => $request->input('staffSalary'),
            'staff_contact' => $request->input('staffContact')
        ]);

        // then redirecting to the controller's index function
        return redirect()->route('staff.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function destroy(Staff $staff)
    {
        // if user is a guest/not authenticated/session is not set then redirect back to login page
        if(Auth::guest()){
            return redirect()->route('login');
        }
        // deleting the staff record
        $staff->delete();
        
        // the redirecting to controllers index function
        return redirect()->route('staff.index');
    }
}
