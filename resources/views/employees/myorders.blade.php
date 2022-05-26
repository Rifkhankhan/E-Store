@extends('employees.layout')
@section('content')

    <h2 class='text-center'>Order Details</h2>
<br>
<!--  -->
   
    <div class="d-flex justify-content-center mt-3 p-3">
      
                <table  class="table table-bordered" >
                   <thead>
                       <tr>
                            <th>No</th>
                            <th>Product Name</th>
                            <th>Details</th>
                            <th>Price</th>
                            <th>Customer Name</th>
                            <th>Customer Address</th>
                            <th>Customer Mobile No</th>
                            <th>Date</th>
                            <th>Status</th>
                       </tr>
                       
                   </thead>
                        @foreach($myorders as $order)
                      <tr>
                          <td>{{++$i}}</td>
                        <td>{{$order->product}}</td> 
                        <td>{{$order->details}}</td> 
                        <td>{{$order->Price}}</td> 
                        <td>{{$order->customer}}</td> 
                        <td>{{$order->customeraddress}}</td> 
                        <td>{{$order->customermobileno}}</td> 
                        <td>{{$order->date}}</td> 
                        <td>
                            @if($order->status=='Not Yet')
                                <a href="{{route('deliveredorder',$order->id)}}" class="btn btn-danger">Yes</a>
                            @elseif($order->status=='delivered')
                                <strong>Delivered</strong> 
                            @elseif($order->status=='cancelled')
                                <strong>Cancelled</strong> 
                            @endif
                        </td> 
                        </tr>

                        @endforeach
                       
                     
                    <tbody>
                    
                    </tbody>
                </table>

    </div>
    
@endsection
