<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Staff;

use App\Models\Medicine;

use App\Models\Prescription;

use App\Models\Stock;

use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // if user is a guest/not authenticated/session is not set then redirect back to login page
        if(Auth::guest()){
            return redirect()->route('login');
        }

        // counting number of staff
        $staff = Staff::count();

        // counting number of medicines
        $medicines = Medicine::count();

        // counting number of out of stock medicines from stock
        $medsEnd = Stock::where('stock_quantity', 0)->count();

        // counting number of prescriptions
        $prescriptions = Prescription::count();

        // counting number of expired meds
        $todayDate = date('Y-m-d');
        // $todayDate = date('2023-07-15');
        // var_dump($todayDate);
        $expiredMeds = Medicine::where('medicine_expiry_date', '<', $todayDate)->get();

        $expiredMeds = count($expiredMeds);

        // echo $expiredMeds;

        // with the counts of cards data
        return view('home', compact('staff', 'medicines', 'medsEnd','prescriptions', 'expiredMeds'));
    }

    // public function reset()
    // {
    //     return view('auth.password.reset');
    // }
}
