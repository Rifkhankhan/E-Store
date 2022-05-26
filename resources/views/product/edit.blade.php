@extends('admin.layout')
@section('content')

    <h2 class='text-center'>Edit The New Product</h2>
    <a href="{{route('admin_products')}}" class="btn btn-secondary mb-3">Back</a>

    <form action="{{ route('product_update',$product->id) }}" method="get">
         @csrf
        @method('PUT')
         <div class="d-flex justify-content-center mt-3 text-center ">
             <div>
                <table>
                    <tr>
                        <th><label for="productname"> Name:</label></th>
                        <td><input type="text" name="productname" id="productname" value="{{ $product->name }}" required> </td>
                    </tr>

                    <tr>
                        <th><label for="productdetails"> Details:</label></th>
                        <td><input type="text" name="productdetails" id="productdetails" value="{{ $product->details }}" required ></td>
                    </tr>

                    <tr>
                        <th><label for="productprice"> Price:</label></th>
                        <td><input type="text" name="productprice" id="productprice" value="{{ $product->price }}" required> </td>
                    </tr>
                
                </table>
             </div>
            
            <div>
            <button class="btn btn-primary">Update</button>

            </div>
         </div>

        


    </form>
    
@endsection
