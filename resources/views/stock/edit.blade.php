@extends('layouts.app')

@section('title', 'Edit Stock')
    
@section('content')

{{-- Form to edit the medicine --}}
@foreach($medicineStock as $stock)

<div class="h3 text-center">Edit {{$stock->medicine_name}}'s Stock</div>

<div class="w-75" style="margin: auto">
    <form action="{{route('medicineStock.update', $stock->stock_id)}}" method="POST">

    @method('PUT')

    {{-- {{$Midicine}} --}}

    @csrf

    <div class="form-group">
      <label for="formGroupExampleInput"><b>Stock Qunatity</b></label>
      <input type="number" class="form-control"  value="{{$stock->stock_quantity}}" placeholder="e.g. 500" name="medicineStock" required autofocus>
    </div>

    <div class="form-group">
      <label for="formGroupExampleInput"><b>Cost of Stock</b></label>
      <input type="number" class="form-control" value="{{$stock->stock_cost_price}}" placeholder="e.g. 15,000" name="medicineStockCost" required autofocus>
    </div>
    @endforeach

    <input class="btn btn-primary" type="submit" value="Submit" onclick="return confirm('Confirm changes?')">
</form>

</div>

@endsection