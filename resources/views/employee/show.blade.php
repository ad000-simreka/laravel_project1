@extends('employee.layout')
@section('content')
<div class="wrapperdiv">
@if($employee)
<div class="row pb-5">
    <div class="col-4"></div>
    <div class="col-4">
    <div class="card" style="width: 20rem;">
  <img src="{{ asset('uploads/'.$employee->photo ) }}" class="card-img-top">
  <div class="card-body">
    <h5 class="card-title">{{ $employee->name}}</h5>
    <p class="card-text">{{ $employee->type}}|{{ $employee->joining_year}}</p>
    
  </div>
</div>       
</div>

<div class="col-4"></div>
</div>

@endif
</div>
@endsection
