@extends('customer.layout')
@section('content')
<div class="ml-3 mt-3">
        

    <h3>Orders Details</h3>


    <form action="{{route('confirm_order',['product'=>$product->id,'customer'=>$customer->id] )}}"  method="get">
                
        <table>
            <tr>
                <th>Product Name:</th><td>{{$product->name}}</td>
            </tr>

            <tr>
                <th>Employee Name:</th class="m-3">
                <td>
                            <select class="form-select"  name='deliveryboy'>
                                @foreach($employees as $employee)
                                    <option value="{{$employee->name}}">{{$employee->name}}</option>
                                @endforeach
                            </select>
                </td>
            </tr>

            <tr>
                <th>Price:</th><td>{{$product->price}}</td>
                <input type="hidden" name="status" value="Not Yet">
            </tr>

        </table>
        <button type="submit" class="btn btn-success">Order</button>

    </form>
</div>

@endsection
