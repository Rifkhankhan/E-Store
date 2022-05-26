@extends('customer.layout')
@section('content')

        @if ($message = Session::get('stored'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
            </div>
            @endif

    <h2 class='text-center'>Welcome to {{$customer->email}} Dashboard</h2>

@endsection
