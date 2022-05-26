@extends('customer.layout')
@section('content')
<div class="ml-3 mt-3">
        
    <h3>Orders Details</h3>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
    <form action="" method="get">
                
            <table class="table table-bordered" >
                <thead class="text-center">
                <tr class="text-center">
                    <th>No</th>
                    <th>Name</th>
                    <th>Details</th>
                    <th>Price</th>
                    <th>Delivery Person</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($myorders as $myorder)
                        <tr class="text-center">
                            <td>{{++$i}}</td>
                            <td>{{$myorder->product}}</td>
                            <td>{{$myorder->details}}</td>
                            <td>{{$myorder->Price}}</td>
                            <td>{{$myorder->employee}}</td>
                            <td>
                                    @if($myorder->status=='Not Yet')
                                        <a href="{{route('cancelorder',$myorder->id)}}" class="btn btn-danger">Cancel Order</a>
                                    @elseif($myorder->status=='delivered')
                                        <strong>Delivered</strong> 
                                    @elseif($myorder->status=='cancelled')
                                        <strong>cancelled</strong> 
                                    @endif
                            </td>
                        </tr>
                    @endforeach
                
                </tbody>
            </table>
        </form>
</div>

@endsection
