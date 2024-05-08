@extends('layouts.app')

@section('title','EMS | Edit Employee')
@section('content')

<div class="container">

      <h1>Edit Employee<a href="{{ route('employee.index') }}" class="btn btn-success float-end">All Employees</a></h1><br/>
      <div>
        @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            @foreach($errors->all() as $error)
              <div> {{ $error }} </div>
            @endforeach
        </div>
        @endif
      </div>
      <form action="{{ route('employee.update',$employee->id) }}" method="post">
        @csrf
             <label>Employee Name</label>
             <input type="text" name="empname" class="form-control" value="{{ $employee->emp_name}}" placeholder="Enter Employee Name"/><br/>
             <label>Employee Address</label>
             <input type="text" name="empadd" class="form-control" value="{{ $employee->emp_address}}" placeholder="Enter Employee Address"/><br/>
             <label>Employee Age</label>
             <input type="text" name="empage" class="form-control" value="{{ $employee->emp_age}}" placeholder="Enter Employee Age"/><br/>
             
             <input type="submit" value="Update" class="btn btn-success"/>
             <input type="reset" value="Reset" class="btn btn-warning"/>
      </form>
</div>

@endsection

