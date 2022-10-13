@extends('layouts.app')

@section('title', 'Medicine Expiry Dates')
    
@section('content')

{{-- Table of staff details --}}

<!-- Begin Page Content -->
<div class="container-fluid">
    
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary">Medicines Expiry Management</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>S#</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th style="color: blue">Expiry Date</th>
                        <th style="color: purple">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($medicines as $medicine)
                        
                    <tr>
                        <td>{{$serial++}}</td>
                        <td>{{$medicine->medicine_name}} ({{$medicine->medicine_dose}})</td>
                        <td>{{$medicine->medicine_type}}</td>
                        <td style="color: blue">{{$medicine->medicine_expiry_date}}</td>
                        <td>
                            <a href="{{route('medicine.show', $medicine)}}" style="color: blue" class="btn btn-link"><i class="fa-solid fa-pencil"></i>Details</a> <br>

                            {{-- Edit only the expiry date of the medicine --}}
                            <a href="{{route('medicineExpiry.edit', $medicine)}}" class="btn btn-link"><i class="fa-solid fa-pencil"></i>Edit</a>
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