@extends('layouts.app')

@section('title', 'Edit Medicine Expiry Date')
    
@section('content')

{{-- Form to edit the medicine expiry date --}}

<div class="h3 text-center">Edit {{$medicineExpiry->medicine_name}}'s Expiry Date</div>

<div class="w-75" style="margin: auto">
    <form action="{{route('medicineExpiry.update', $medicineExpiry)}}" method="POST">

    @method('PUT')

    @csrf
      <div class="form-group">
        <label for="formGroupExampleInput"><b>Expiry Date</b></label>
        <input id="date" type="date" class="form-control datepicker" value="{{$medicineExpiry->medicine_expiry_date}}" name="medicineExpiry" required autofocus>
      </div>

    <input class="btn btn-primary" type="submit" value="Submit Changes" onclick="return confirm('Confirm changes?')">
</form>
</div>

@endsection