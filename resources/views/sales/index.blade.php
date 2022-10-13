@extends('layouts.app')

@section('title', 'All Sales')
    
@section('content')

{{-- Table of staff details --}}

<!-- Begin Page Content -->
<div class="container-fluid">
    
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary">Sales Record</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>S#</th>
                        {{-- <th>Customer</th> --}}
                        <th>Medicine</th>
                        <th>Quantity sold</th>
                        <th>Cash</th>
                        <th>Date</th>
                        {{-- <th style="color: purple">Actions</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sales as $sale)
                        
                    <tr>
                        <td style="font-weight: bold">{{$serial++}}.</td>
                        {{-- <td>{{$sale->customer_name}}</td> --}}
                        <td>{{$sale->medicine_name}} ({{$sale->medicine_dose}})</td>
                        <td>{{$sale->sale_quantity}}</td>
                        <td style="color: green">+ {{$sale->sale_amount}} Rs</td>
                        <td>{{$sale->sale_created_at}}</td>
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