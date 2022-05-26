@extends('admin.layout')
@section('content')

    <h2 class='text-center'>Add A New Product</h2>
   
    <div class="d-flex justify-content-center mt-3 p-3 colomn">
        <div>
            <a href="{{route('admin_products')}}" class="btn btn-secondary mb-3">Back</a>
        </div>

        <div>
            <form action="{{route('product_store')}}" method="get">
            <table class="p-3 " >
                <tr>
                    <th><label for="productname"> Name:</label></th>
                    <td><input type="text" name="productname" id="productname"></td>
                </tr>

                <tr>
                    <th><label for="productdetails"> Details:</label></th>
                    <td><input type="text" name="productdetails" id="productdetails"></td>
                </tr>

                <tr>
                    <th><label for="productprice"> Price:</label></th>
                    <td><input type="text" name="productprice" id="productprice"></td>
                </tr>

            
            </table>
                <tr>
                    <button class="btn btn-success">Create</button>
                </tr>
            </form>
        </div>
       
    </div>
   

@endsection
