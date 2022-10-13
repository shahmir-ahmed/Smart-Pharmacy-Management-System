@extends('layouts.app')

@section('title', 'Add Staff')
    
@section('content')

{{-- Form to add new staff --}}

<div class="h3 text-center">Add New Staff</div>

<div class="w-75" style="margin: auto">
    <form action="{{route('staff.store')}}" method="POST">

    @csrf

    <div class="form-group">
      <label for="formGroupExampleInput"><b>Full Name</b></label>
      <input type="text" class="form-control" name="staffName" required autofocus>
    </div>

    <div class="form-group">
      <label for="formGroupExampleInput"><b>Position</b></label>
      <input type="text" class="form-control" name="staffPosition" required autofocus>
    </div>
    <div class="form-group">
      <label for="formGroupExampleInput"><b>Contact Number</b></label>
      <input type="text" class="form-control" placeholder="e.g. 0333-1234567" name="staffContact" required autofocus>
    </div>
    <div class="form-group">
      <label for="formGroupExampleInput"><b>Salary</b></label>
      <input type="text" class="form-control" placeholder="e.g. 20,000" name="staffSalary" required autofocus>
    </div>

    <input class="btn btn-primary" type="submit" value="Submit">
</form>
</div>

@endsection