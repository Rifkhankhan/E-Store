@extends('employees.layout')
@section('content')

    <h2 class='text-center'>Reset Your Password</h2>

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

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
    
    <div class="d-flex justify-content-center mt-3 p-3">
        <form action="{{route('updatepassword',$employee->id)}}" method="get">
        @csrf
        @method('PUT')
                <table class="p-3 " >
                    <tr>
                        <th><label for="currentpassword">Current Password:</label></th>
                        <td><input type="password" name="currentpassword" id="currentpassword"></td>
                    </tr>
                    <tr>
                        <th><label for="newpassword">New Password:</label></th>
                        <td><input type="password" name="newpassword" id="newpassword"></td>
                    </tr>
                    <tr>
                        <th><label for="confirmpassword">Confirm Password:</label></th>
                        <td><input type="password" name="confirmpassword" id="confirmpassword"></td>
                    </tr>
                </table>

                 <button type="submit" class="btn btn-success">Reset</button>
        </form>
    </div>
    
@endsection
