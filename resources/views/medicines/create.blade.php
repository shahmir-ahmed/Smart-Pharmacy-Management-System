@extends('layouts.app')

@section('title', 'Add Medicine')
    
@section('content')

{{-- Form to add new medicine --}}

<div class="h3 text-center">Add New Medicine</div>

<div class="w-75" style="margin: auto">
    <form action="{{route('medicine.store')}}" method="POST">

    @csrf

    <div class="form-group">
      <label for="formGroupExampleInput"><b>Name</b></label>
      <input type="text" class="form-control" name="medicineName" required autofocus>
    </div>

    <div class="form-group">
      <label for="formGroupExampleInput"><b>Type</b></label>
      <!-- Example single danger button -->
        <select id="title" class="form-control" name="medicineType" required autofocus>
            <option value="">Choose Type</option>
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
      <input type="text" class="form-control" placeholder="e.g. 10mg etc." name="medicineDose" required autofocus>
    </div>

    <div class="form-group">
      <label for="formGroupExampleInput"><b>Price (Per Item)</b></label>
      <input type="number" id="price" min="1" oninput ="this.value = Math.abs(this.value)" class="form-control" placeholder="e.g. 20 etc." name="medicinePrice" required autofocus>
    </div>

    <div class="form-group">
      <label for="formGroupExampleInput"><b>Expiry Date</b></label>
      <input id="date" type="date" min="" class="form-control expiryDate" name="medicineExpiry" required autofocus>
    </div>

    <div class="form-group">
      <label for="formGroupExampleInput"><b>Comapany Name</b></label>
      <input type="text" class="form-control" name="medicineCompany" required autofocus>
    </div>

    <div class="h3">Stock Details:</div>

    <hr>

    <div class="form-group">
      <label for="formGroupExampleInput"><b>Stock Qunatity</b></label>
      <input type="number" id="quantity" min="1" oninput ="this.value = Math.abs(this.value)" class="form-control" placeholder="e.g. 500" name="medicineStock" required autofocus>
    </div>

    <div class="form-group">
      <label for="formGroupExampleInput"><b>Cost of Stock</b></label>
      <input type="number" id="stockCost" min="1" oninput ="this.value = Math.abs(this.value)" class="form-control" placeholder="e.g. 15,000" name="medicineStockCost" required autofocus>
    </div>

    <input class="btn btn-primary" type="submit" value="Submit">
</form>
</div>

{{-- <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js">

       $('#date').datepicker({ 
           minDate: new Date()
        });
        console.log('hello');
        
    </script> --}}

@endsection

@section('script')

{{-- <script>

  $('#date').datepicker({ 
      minDate: new Date()
   });
   console.log('hello');
   
</script> --}}
@endsection