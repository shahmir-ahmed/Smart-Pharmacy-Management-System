@extends('layouts.app')

@section('title', 'Edit Prescription')
    
@section('content')

{{-- Form to edit the medicine --}}

<div class="h3 text-center">Edit Prescription</div>

<div class="w-75" style="margin: auto">
    {{-- @foreach($prescriptions as $prescription) --}}
    <form action="{{route('prescription.update', $prescription)}}" method="POST">

    @method('PUT')

    @csrf

    <div class="form-group">
        <label for="formGroupExampleInput"><b>Customer Name</b></label>
        <input type="text" class="form-control" value="{{$prescription->patient_name}}" name="customerName" required autofocus>
      </div>

    <div class="form-group">
        <label for="formGroupExampleInput"><b>Customer Age</b></label>
        <input type="number" id="age" min="1" oninput ="this.value = Math.abs(this.value)" class="form-control" value="{{$prescription->patient_age}}" name="customerAge" required autofocus>
      </div>
  
      <div class="form-group">
        <label for="formGroupExampleInput"><b>Prescription Prescriber</b></label>
        <input type="text" class="form-control" value="{{$prescription->prescription_prescribed_by}}" name="prescriptionPrescribedBy" required autofocus>
      </div>
  
      <div class="form-group">
        <label for="formGroupExampleInput"><b>Prescription Disease</b></label>
        <input type="text" class="form-control" value="{{$prescription->prescription_disease}}" name="prescriptionDisease" required autofocus>
      </div>
      {{-- @endforeach --}}

    <input class="btn btn-primary" type="submit" value="Submit Changes" onclick="return confirm('Confirm changes?')">
</form>
</div>

@endsection