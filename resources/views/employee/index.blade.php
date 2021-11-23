@extends('employee.layout')
@section('content')
<div class="wrapperdiv">
  @if($message = Session::get('success'))
  <div class="alert alert-success text-center">{{ $message }}</div>
  @endif  
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
  <table class="table">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">Name</th>
      <th scope="col">Type</th>
      <th scope="col">Joining Year</th>
      <th scope="col">Actions</th>
      
    </tr>
  </thead>
  @if($employee)
  <tbody>
    @foreach($employee as $employee)
    <tr>
    <td class="align middle"><img src="{{ asset('uploads/'.$employee->photo ) }} " class="img-thumbnail"/></td>
      <td class="align middle">{{ $employee->name }}</td>
      <td class="align middle">{{ $employee->type }}</td>
      <td class="align middle">{{ $employee->joining_year }}</td>
      <td class="align middle">
        <form action="{{ route('employee.destroy', $employee->id) }}" method="post">
        <a href="{{ route('employee.show', $employee->id)}} " class="btn btn-success">Show</a>
        <a href="{{ route('employee.edit', $employee->id)}} " class="btn btn-primary">Edit</a>
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure want to delete')">Delete</button>
        
        
      </td>
    </tr>
    @endforeach
    
  </tbody>
 
  @endif
</table>

</div>
@endsection     
