@extends('layouts.app')

@section('content')
<div class="row">
     <a class="btn btn-success" href="{{ route('employee.create') }}"> Add New employee</a>
    <div class="col-sm-12">

      <table class="table">
        <tr>
          <th>id</th>
          <th>name</th>
          <th>Email</th>
          <th>phone</th>
          <th>Image</th>
          
        </tr>
        @foreach($employee as $employee)   
          <tr class = "text-center">
            <td>{{ $employee->id }}</td>
            <td>{{ $employee->name }}</td>
            <td>{{ $employee->email }}</td>
            <td>{{ $employee->phone }}</td>
           <td>{{ $employee->image }}</td>

            <td><a href="{{ route ('employee.edit',$employee->id) }}" class = "btn btn-info">Edit</a></td>
            <td><a href="{{ route ('employee.destroy',$employee->id) }}" class = "btn btn-danger">Delete</a></td>
          </tr>
        @endforeach
      </table>
    </div>
  </div>
@endsection