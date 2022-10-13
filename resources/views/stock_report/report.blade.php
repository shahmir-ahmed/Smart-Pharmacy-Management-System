@extends('layouts.app')

@section('title', 'Medicine Stock Report')
    
@section('content')

{{-- Table of staff details --}}

<!-- Begin Page Content -->
<div class="container-fluid">
    
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary">Stock Report</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>S#</th>
                        <th>Medicine</th>
                        <th>Stock Avalaible</th>
                        <th>Stock Cost Price</th>
                        <th>Stock Purchase Date & Time</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($medicineStock as $details)
                        
                    <tr>
                        <td>1.</td>
                        <td>{{$details->medicine_name}} ({{$details->medicine_dose}})</td>
                        <td>{{$details->stock_quantity}}</td>
                        <td>{{$details->stock_cost_price}} Rs</td>
                        <td>{{$details->stock_created_at}}</td>
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