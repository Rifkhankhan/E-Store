@extends('customer.layout')
@section('content')
<div class="ml-3 mt-3">
        
    <h3>Orders Details</h3>


    <form action="" method="get">
                
            <table class="table table-bordered" >
                <thead class="text-center">
                <tr class="text-center">
                    <th>No</th>
                    <th>Name</th>
                    <th>Details</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr class="text-center">
                            <td>{{++$i}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->details}}</td>
                            <td>{{$product->price}}</td>
                            <td>
                                    <a href="{{route('place_order',['product'=>$product->id,'customer'=>$customer->id])}}" class="btn btn-primary">Place Order</a>
                            </td>
                        </tr>
                    @endforeach
                
                </tbody>
            </table>
        </form>
</div>

@endsection
