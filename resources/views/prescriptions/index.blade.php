@extends('layouts.app')

@section('title', 'Prescriptions')
    
@section('content')

{{-- Table of staff details --}}

<!-- Begin Page Content -->
<div class="container-fluid">
    
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary">Prescriptions Record</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>S#</th>
                        <th>Patient Name</th>
                        <th>Patient Age</th>
                        <th>Prescribed By</th>
                        <th>Disease</th>
                        <th style="color: purple">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($prescriptions as $prescription)
                        
                    <tr>
                        <td>{{$serial++}}</td>
                        <td>{{$prescription->patient_name}}</td>
                        <td>{{$prescription->patient_age}}</td>
                        <td>{{$prescription->prescription_prescribed_by}}</td>
                        <td>{{$prescription->prescription_disease}}</td>
                        <td>
                            <a href="{{route('prescription.show', $prescription)}}" style="color: blue" class="btn btn-link"><i class="fa-solid fa-pencil"></i>Details</a> <br>

                            <a href="{{route('prescription.edit', $prescription)}}" class="btn btn-link"><i class="fa-solid fa-pencil"></i>Edit</a>

                            <form action="{{ route('prescription.destroy', $prescription) }}" method="POST">
                                @method('DELETE')
                                @csrf

                                <button type="submit" style="color: red" class="btn btn-link" onclick="return confirm('Are you sure? Because it will also delete all the sales and transaction data of the patient?')">Remove</button>
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