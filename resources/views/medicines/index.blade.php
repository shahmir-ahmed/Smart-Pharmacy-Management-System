@extends('layouts.app')

@section('title', 'Medicines')
    
@section('content')

{{-- Table of staff details --}}

<!-- Begin Page Content -->
<div class="container-fluid">
    
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary">Medicine Record</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>S#</th>
                        <th>Name</th>
                        <th>Dose/Weight</th>
                        <th>Type</th>
                        <th>Price</th>
                        <th>Comapany</th>
                        <th style="color: gold">Stock</th>
                        <th style="color: purple">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($medicines as $medicine)
                        
                    <tr>
                        <td>{{$serial++}}</td>
                        <td>{{$medicine->medicine_name}}</td>
                        <td>{{$medicine->medicine_dose}}</td>
                        <td>{{$medicine->medicine_type}}</td>
                        <td>{{$medicine->medicine_price}} Rs</td>
                        <td>{{$medicine->medicine_company_name}}</td>
                        @if($medicine->stock_quantity==0)
                        <td style="color: red">{{$medicine->stock_quantity}} (Out of Stock)</td>
                        @else
                        <td style="color: green">{{$medicine->stock_quantity}} (In Stock)</td>
                        @endif
                        <td>
                            <a href="{{route('medicine.show', $medicine)}}" style="color: blue" class="btn btn-link"><i class="fa-solid fa-pencil"></i>View</a> <br>

                            <a href="{{route('medicine.edit', $medicine)}}" class="btn btn-link"><i class="fa-solid fa-pencil"></i>Edit</a>

                            <form action="{{ route('medicine.destroy', $medicine) }}" method="POST">
                                @method('DELETE')
                                @csrf

                                <button type="submit" style="color: red" class="btn btn-link" onclick="return confirm('Are you sure?')">Remove</button>
                            </form>
                        </td>
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