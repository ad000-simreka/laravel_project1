@extends('employee.layout')
@section('content')
<div class="wrapperdiv">
    <div class="formcontainer">
        <div class="row">
            <div class ="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Edit Employee</h2>
</div>
</div>
</div>
@if($errors->any())
<div class="alert alert-danger">
    <strong>Warning! Please Enter the Required Inputs to be Updated </strong>
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
</ul>
</div>

@endif
        <form 
        action="{{ route('employee.update',$employee->id)}}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group row">
            <lable for="name" class="col-sm-2 col-form-control"
            >Name</lable>
            <div class="col-sm-10">
                <input
                type="text"
                name="name"
                id="name"
                class="form-control"
                value="{{ $employee->name }}"/>
                
</div>
&nbsp;&nbsp;

</div>

        <div class="form-group row">
            <lable for="type" class="col-sm-2 col-form-control"
            >Type</lable>
            <div class="col-sm-10">
                <select name="type" 
                        id="type" 
                        class="form-control">
                    <option value="">Select Type</option>
                    @if($types)
                    @foreach($types as $type)
                         <option  @if($type == $employee->type) selected @endif value="{{ $type }}"  >{{ $type }}</option>
                    
                    @endforeach
                    @endif

                </select>

</div>
&nbsp;&nbsp;

</div>

        <div class="form-group row">
            <lable for="joining_year" class="col-sm-2 col-form-control"
            >Joining Year</lable>
            <div class="col-sm-10">
                <input
                type="number"
                name="joining_year"
                id="joining_year"
                class="form-control"
                value="{{ $employee->joining_year }}"/>
</div>
&nbsp;&nbsp;

</div>


        <div class="form-group row">
            <lable for="photo" class="col-sm-2 col-form-control"
            >Photo</lable>
            <div class="col-sm-10">
                <input
                type="file"
                name="photo"
                id="photo"
                class="form-control-file"/>
</div>
&nbsp;&nbsp;

</div>

                <div class="form-group row">
                <div class="col-sm-2"></div>
            <div class="col-sm-10">
                <button
                type="submit"
                name="submit"
                id="submit"
                class="btn btn-primary">SUBMIT</button>

</div>
</div>
</div>
</div>
    </form>
</div>
</div>
@endsection