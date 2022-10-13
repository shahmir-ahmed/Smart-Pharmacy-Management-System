@extends('layouts.app')

@section('title', 'Edit Medicine')
    
@section('content')

{{-- Form to edit the medicine --}}

<div class="h3 text-center">Edit Medicine</div>

<div class="w-75" style="margin: auto">
    <form action="{{route('medicine.update', $medicine)}}" method="POST">

    @method('PUT')

    {{-- {{$Midicine}} --}}

    @csrf

    <div class="form-group">
        <label for="formGroupExampleInput"><b>Name</b></label>
        <input type="text" class="form-control" value="{{$medicine->medicine_name}}" name="medicineName" required autofocus>
      </div>
  
      <div class="form-group">
        <label for="formGroupExampleInput"><b>Type</b></label>
        <!-- Example single danger button -->
          <select id="title" class="form-control" name="medicineType" required autofocus>
              <option value="{{$medicine->medicine_type}}">{{$medicine->medicine_type}}</option>
              <option value="">Choose type</option>
              <option value="Liquid">Liquid</option>
              <option value="Tablet">Tablet</option>
              <option value="Capsules">Capsules</option>
              <option value="Topical Medicines">Tropical Medicines</option>
              <option value="Drops">Drops</option>
              <option value="Inhalers">Inhalers</option>
              <option value="Implants/Patches">Implants/Patches</option>
          </select>
      </div>
  
      <div class="form-group">
        <label for="formGroupExampleInput"><b>Dose/Weight</b></label>
        <input type="text" class="form-control" value="{{$medicine->medicine_dose}}" placeholder="e.g. 10mg etc." name="medicineDose" required autofocus>
      </div>
  
      <div class="form-group">
        <label for="formGroupExampleInput"><b>Price (Per Item)</b></label>
        <input type="number" id="price" min="1" oninput ="this.value = Math.abs(this.value)" class="form-control" value="{{$medicine->medicine_price}}" placeholder="e.g. 20 etc." name="medicinePrice" required autofocus>
      </div>
  
      <div class="form-group">
        <label for="formGroupExampleInput"><b>Expiry Date</b></label>
        <input id="date" type="date" class="form-control expiryDate" value="{{$medicine->medicine_expiry_date}}" name="medicineExpiry" required autofocus>
      </div>
  
      <div class="form-group">
        <label for="formGroupExampleInput"><b>Company Name</b></label>
        <input type="text" class="form-control" value="{{$medicine->medicine_company_name}}" name="medicineCompany" required autofocus>
      </div>

    <input class="btn btn-primary" type="submit" value="Submit Changes" onclick="return confirm('Confirm changes?')">
</form>
</div>

@endsection