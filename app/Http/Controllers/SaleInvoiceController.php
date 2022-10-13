<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Medicine;
use App\Models\Customer;
use App\Models\Prescription;
use App\Models\Transaction;
use App\Models\Stock;
use Illuminate\Http\Request;
use Auth;

// This controller will control the sales invoice data

class SaleInvoiceController extends Controller
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

        // $customers = Customer::all();

        $serial = 1;

        return view('sale_invoice.index',compact('medicines', 'serial'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // inserting customer record in customer table
        // $customer = Customer::create([
        //    'customer_name' => $request->input('customerName') ,
        //    'customer_age' => $request->input('customerAge') ,
        //    'customer_gender' => $request->input('customerGender') ,
        //    'customer_contact' => $request->input('customerContact') 
        // ]);

        // $customerId = $customer->customer_id ;

        // $prescription = Prescription::create([
        //     'prescription_prescribed_by' => $request->input('prescribedBy'),
        //     'prescription_disease' => $request->input('prescriptionDisease'),
        //     'prescription_customer_id' => $customerId
        // ]);

        // $prescriptionId = $prescription->prescription_id;

        // Till here query is running perfectly

        // $prescription = Prescription::create([
        //     'customer_name' => $request->input('customerName'),
        //     'customer_age' => $request->input('customerAge'),
        //     'customer_gender' => $request->input('customerGender'),
        //     'prescription_prescribed_by' => $request->input('prescriptionPrescribedBy'),
        //     'prescription_disease' => $request->input('prescriptionDisease')
        //     ]);
    

        // $prescriptionId = $prescription->prescription_id;

        // $MedicineIds = array();

        // $MedicineIds = $request->input('medicine_id');

        // var_dump($MedicineIds);

        // echo '<br/>';
        
        // $quantity = array();

        // $quantity = $request->input('quantity');

        // var_dump($quantity);

        // echo '<br/>';

        // $price = array();

        // $price = $request->input('price');

        // var_dump($price);

        // echo '<br/>';

        // $total = array();

        // $total = $request->input('total');

        // var_dump($total);

        
        // $bill = $request->input('bill');

        // echo ($bill) ;
        
        // Sale::create([
            // 'sale_quantity' => $request->input('saleQuantity'),
            // 'sale_amount' => $request->input('saleAmount'),
            // 'sale_medicine_id' => $MedicineId,
            // 'sale_prescription_id' => $prescriptionId,
            // 'sale_customer_id' => $customerId
            // ]);
            
            // echo $request->input('saleQuantity');
            // echo $request->input('saleAmount');
            // echo $MedicineId;
            // echo $prescriptionId;
            // echo $customerId;
            
            // return redirect()->route('home');

            // return $request->all();

            // $medicines = array();

            // $medicines = $request->input('medicine_id');
            // echo(count($request->input('medicine_id')));

            // var_dump(medicines);

            // if user is a guest/not authenticated/session is not set then redirect back to login page
            if(Auth::guest()){
                return redirect()->route('login');
            }

            // Prescription Modal

            $prescription = Prescription::create([
                'prescription_prescribed_by' => $request->input('prescriptionPrescribedBy'),
                'prescription_disease' => $request->input('prescriptionDisease'),
                'patient_name' => $request->input('customerName'),
                'patient_age' => $request->input('customerAge')
            ]);

            $prescriptionId = $prescription->prescription_id;

            
            
            // Error: Call to a member function decrement() on string
            // for($medicine_id = 0; $medicine_id < count($request->input('medicine_id')); $medicine_id++){
                //       Stock::where('medicine_id', $request->input('medicine_id')[$medicine_id]
                //       ->decrement('stock_quantity', $request->input('quantity')[$medicine_id]));
                // }

            // Stock Modal

                foreach( $request->input('quantity') as $key => $quantity ) {
                    Stock::where('stock_medicine_id', $request->input('medicine_id')[$key])
                        ->decrement('stock_quantity', $quantity);
                      }

            // Transaction Modal

            $transaction = Transaction::create([
                'transaction_bill' =>$request->input('TransactionBill') ,
                'transaction_paid_amount' => $request->input('paid_amount'),
                'transaction_payment_method' => $request->input('payment_method')
            ]);

            $transactionId = $transaction->transaction_id;

            // Sales Modal

            // for each selected medicines run the loop
            for($medicine_id = 0; $medicine_id < count($request->input('medicine_id')); $medicine_id++){

                $sale_details = new Sale;

                $sale_details->sale_quantity = $request->quantity[$medicine_id];
                $sale_details->sale_medicine_price = $request->price[$medicine_id];
                $sale_details->sale_amount = $request->total[$medicine_id];
                $sale_details->sale_medicine_id = $request->medicine_id[$medicine_id];
                $sale_details->sale_prescription_id = $prescriptionId;
                $sale_details->sale_transaction_id = $transactionId;

                $sale_details->save();
                // Sale::create([
                //     'sale_quantity'  => $request->input('prescriptionPrescribedBy'),
                //     'sale_amount'  => $request->input('price'),
                //     'sale_medicine_id'  => $request->input('medicine_id'),
                //     'sale_prescription_id'  => $request->input('prescriptionPrescribedBy'),
                //     'sale_transaction_id'  => $request->input('prescriptionPrescribedBy')
                // ]);
            }

            // // $count = count($request->input($medicine_id));

            // // echo $count;
            return redirect()->route('sale.index');

            // return '<script> window.print() </script>';

        }
    }
    