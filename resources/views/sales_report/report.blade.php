@extends('layouts.app')

@section('title', 'Medicine Sales Report')
    
@section('content')

{{-- Table of Sales details --}}

<!-- Begin Page Content -->
<div class="container-fluid">
    
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary">Sales Report</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>S#</th>
                        <th>Medicine</th>
                        <th>Sold Quantity</th>
                        <th>Cash</th>
                        <th>Sales Date & Time</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($medicineSales as $details)
                        
                    <tr>
                        <td>1.</td>
                        <td>{{$details->medicine_name}} ({{$details->medicine_dose}})</td>
                        <td>{{$details->sale_quantity}}</td>
                        <td style="color: green">+ {{$details->sale_amount}} Rs</td>
                        <td>{{$details->sale_created_at}}</td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

@endsection