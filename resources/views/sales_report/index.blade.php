@extends('layouts.app')

@section('title', 'Generate Sales Report')
    
@section('content')

{{-- Links to generate medicine sale report --}}

<div class="h3 text-center">Generate Sales Report</div>

<div class="w-75" style="margin: auto">

    <div class="form-group">
      <label for="formGroupExampleInput"><b>Select Medicine</b></label>
      <ul>
          @foreach ($medicines as $medicine)
          <li><a href="{{route('ReportController.salesReport', $medicine)}}">{{$medicine->medicine_name}}</a></li>
          @endforeach
        </ul>
    </div>

</form>
</div>
@endsection