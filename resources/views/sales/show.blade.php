@extends('layouts.app')

@section('title', 'Prescription')
    
@section('content')

{{-- Table of specific prescription details --}}

<!-- Begin Page Content -->
<div class="container-fluid">
    
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">

        <h4 class="m-0 font-weight-bold text-primary">Sale Details:</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <tbody>
                    <tr>
                        <th>Patient Name</th>
                        <td>{{$prescription->patient_name}}</td>
                    </tr>
                    <tr>
                        <th>Patient Age</th>
                        <td>{{$prescription->patient_age}}</td>
                    </tr>
                    <tr>
                        <th>Prescription Prescriber</th>
                        <td>{{$prescription->prescription_prescribed_by}}</td>
                    </tr>
                    <tr>
                        <th>Prescription Disease</th>
                        <td style="color: orange">{{$prescription->prescription_disease}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

@endsection