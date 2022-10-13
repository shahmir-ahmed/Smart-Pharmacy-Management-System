@extends('layouts.app')

@section('title', 'Staff Details')
    
@section('content')

{{-- Table of specific staff details --}}

<!-- Begin Page Content -->
<div class="container-fluid">
    
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">

        <h4 class="m-0 font-weight-bold text-primary">Staff Details:</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <tbody>
                    <tr>
                        <th>Name</th>
                        <td>{{$staff->staff_name}}</td>
                    </tr>
                    <tr>
                        <th>Position</th>
                        <td>{{$staff->staff_position}}</td>
                    </tr>
                    <tr>
                        <th>Salary</th>
                        <td>{{$staff->staff_salary}}</td>
                    </tr>
                    <tr>
                        <th>Contact</th>
                        <td>{{$staff->staff_contact}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

@endsection