@extends('employees.layout')
@section('content')

    <h2 class='text-center'>Edit The Employee</h2>
    <a href="{{route('admin_employees')}}" class="btn btn-secondary mb-3">Back</a>

    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    
    <div class="d-flex justify-content-center mt-3 p-3">
        <form action="{{route('employees.update',$employee->id)}}" method="post">
        @csrf
        @method('PUT')
                <table class="p-3 " >
                    <tr>
                        <th><label for="employeename"> Name:</label></th>
                        <td><input type="text" name="employeename" id="employeename" value="{{$employee->name}}"></td>
                    </tr>

                    <tr>
                        <th><label for="employeeemail"> Email:</label></th>
                        <td><input type="email" name="employeeemail" id="employeeemail" value="{{$employee->email}}"></td>
                    </tr>

                    <tr>
                        <th><label for="genter">Genter:</label></th>
                        <td>
                            <select class="form-select" id="genter" name='employeegenter' >
                                <option value="male" {{ $employee->genter == 'male' ? 'selected' : '' }}>male</option>
                                <option value="female" {{ $employee->genter == 'female' ? 'selected' : '' }}>female</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <th><label for="employeeaddress"> Address:</label></th>
                        <td><input type="text" name="employeeaddress" id="employeeaddress" value="{{$employee->address}}"></td>
                    </tr>
                    
                    <tr>
                        <th><label for="employeemobile"> Mobile No:</label></th>
                        <td><input type="text" name="employeemobile" id="employeemobile" value="{{$employee->mobileno}}"></td>
                    </tr>
                
                    <tr>
                        <th><label for="employeepassword"> Password:</label></th>
                        <td><input type="password" name="employeepassword" id="employeepassword"></td>
                    </tr>
                </table>

                 <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
    
@endsection
