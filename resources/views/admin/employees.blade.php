@extends('admin.layout')
@section('content')

       <a href="{{route('employees_create')}} " class="btn btn-secondary mb-3">Enroll New Employee</a>

        @if ($message = Session::get('stored'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif

                    
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <p></p>{{ $error }}</p>
                        @endforeach
                    </ul>
                </div>
            @endif
                    
        <table class="table table-bordered" >
            <thead class="text-center">
            <tr class="text-center">
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach($employees as $employee)
                    <tr class="text-center">
                    <td>{{++$i}}</td>
                    <td>{{$employee->name}}</td>
                    <td>{{$employee->email}}</td>
                    <td>{{$employee->mobileno}}</td>
                    <td>
                    <form action="{{route('employees.destroy',$employee->id)}}" method="post">

                        <a href="{{route('employees.show',$employee->id)}}" class="btn btn-primary">Show</a>
                        <a href="{{route('employees.edit',$employee->id)}}" class="btn btn-success">Edit</a>
                        @csrf
                        @method('DELETE')      
                        <button  class="btn btn-danger">Delete</button>
                     </form>
                    </td>
            </tr>

                @endforeach
              
            
            </tbody>
        </table>

@endsection
