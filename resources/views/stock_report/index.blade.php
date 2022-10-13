@extends('layouts.app')

@section('title', 'Generate Stock Report')
    
@section('content')

{{-- Links to generate medicine stock report --}}

<div class="h3 text-center">Generate Stock Report</div>

<div class="w-75" style="margin: auto">
    {{-- <form action="{{route('ReportController.stockReport', $medicine)}}" method="POST"> --}}

    {{-- @csrf --}}

    <div class="form-group">
      <label for="formGroupExampleInput"><b>Select Medicine</b></label>
      {{-- <select name="medicine" class="form-control" required>
        <option value="">Select Medicine</option>   
        @foreach ($medicines as $medicine)
        <option><a href="{{route('ReportController.stockReport', $medicine)}}">{{$medicine->medicine_name}}</a></option>
        @endforeach
      </select> --}}
      <ul>
          @foreach ($medicines as $medicine)
          <li><a href="{{route('ReportController.stockReport', $medicine)}}">{{$medicine->medicine_name}}</a></li>
          @endforeach
        </ul>
    </div>

    {{-- <input class="btn btn-primary" type="submit" name="submit" value="Generate"> --}}
</form>
</div>

@endsection