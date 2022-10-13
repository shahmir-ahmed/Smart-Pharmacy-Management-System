@extends('layouts.app')

@section('title', 'Edit Staff')
    
@section('content')

{{-- Form to edit the staff --}}

<div class="h3 text-center">Edit Staff</div>

<div class="w-75" style="margin: auto">
    <form action="{{route('staff.update', $staff)}}" method="POST">

    @method('PUT')

    @csrf

    <div class="form-group">
      <label for="formGroupExampleInput"><b>Full Name</b></label>
      <input type="text" class="form-control" name="staffName" value="{{$staff->staff_name}}" required autofocus>
    </div>

    <div class="form-group">
      <label for="formGroupExampleInput"><b>Position</b></label>
      <input type="text" class="form-control" name="staffPosition" value="{{$staff->staff_position}}" required autofocus>
    </div>
    <div class="form-group">
      <label for="formGroupExampleInput"><b>Contact Number</b></label>
      <input type="text" class="form-control" placeholder="e.g. 0333-1234567" name="staffContact" value="{{$staff->staff_contact}}" required autofocus>
    </div>
    <div class="form-group">
      <label for="formGroupExampleInput"><b>Salary</b></label>
      <input type="text" class="form-control" placeholder="e.g. 20,000" name="staffSalary" value="{{$staff->staff_salary}}" required autofocus>
    </div>

    <input class="btn btn-primary" type="submit" value="Submit" onclick="return confirm('Confirm changes?')">
</form>
</div>

@endsection