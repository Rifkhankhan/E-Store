@extends('employees.layout')
@section('content')
<div class="ml-3 mt-3">
    <a href="{{route('admin_employees')}}" class="btn btn-secondary mb-3">Back</a>
        
    <h3>Employee Details</h3>


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $employee->name }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                {{ $employee->email }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Genter:</strong>
                {{ $employee->genter }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Address:</strong>
                {{ $employee->address }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Mobile No:</strong>
                {{ $employee->mobileno }}
            </div>
        </div>
    </div>
</div>

@endsection
