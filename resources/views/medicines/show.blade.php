@extends('layouts.app')

@section('title', 'Medicine Details')
    
@section('content')

{{-- Table of speecific medicine details --}}

<!-- Begin Page Content -->
<div class="container-fluid">
    
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        @foreach($medicineDetails as $medicine)
        <h4 class="m-0 font-weight-bold text-primary">{{$medicine->medicine_name}} Details:</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <tbody>
                    <tr>
                        <th>Name</th>
                        <td>{{$medicine->medicine_name}}</td>
                    </tr>
                    <tr>
                        <th>Dose/Weight</th>
                        <td>{{$medicine->medicine_dose}}</td>
                    </tr>
                    <tr>
                        <th>Type</th>
                        <td>{{$medicine->medicine_type}}</td>
                    </tr>
                    <tr>
                        <th>Price</th>
                        <td>{{$medicine->medicine_price}} Rs</td>
                    </tr>
                    <tr>
                        <th>Comapany</th>
                        <td>{{$medicine->medicine_company_name}}</td>
                    </tr>
                    <tr>
                        <th>Expiry Date</th>
                        <td>{{$medicine->medicine_expiry_date}}</td>
                    </tr>
                    <tr>
                        <th>Stock</th>
                        @if($medicine->stock_quantity==0)
                        <td style="color: red">{{$medicine->stock_quantity}}(Out of Stock)</td>
                        @else
                        <td style="color: green">{{$medicine->stock_quantity}} (In Stock)</td>
                        @endif
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