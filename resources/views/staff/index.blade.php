@extends('layouts.app')

@section('title', 'Staff')
    
@section('content')

{{-- Table of staff details --}}

<!-- Begin Page Content -->
<div class="container-fluid">
    
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary">Staff Record</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>S#</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Salary</th>
                        <th>Contact</th>
                        <th style="color: green">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($staffs as $staff)
                        
                    <tr>
                        <td>{{$serial++}}</td>
                        <td>{{$staff->staff_name}}</td>
                        <td>{{$staff->staff_position}}</td>
                        <td>{{$staff->staff_salary}} Rs</td>
                        <td>{{$staff->staff_contact}}</td>
                        <td>
                            <a href="{{route('staff.show', $staff)}}" class="btn btn-link"><i class="fa-solid fa-pencil"></i>Details</a> <br>

                            <a href="{{route('staff.edit', $staff)}}" class="btn btn-link"><i class="fa-solid fa-pencil"></i>Edit</a>

                            <form action="{{ route('staff.destroy', $staff) }}" method="POST">
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