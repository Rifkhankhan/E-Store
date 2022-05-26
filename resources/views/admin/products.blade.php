@extends('admin.layout')
@section('content')

   <form action="" method="get">
       <a href="{{route('product_create')}}" class="btn btn-secondary mb-3">Create New Product</a>

       @if ($message = Session::get('stored'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

                
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <p></p>{{ $error }}</p>
                    @endforeach
                </ul>
            </div>
        @endif
                
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
                    <a href="{{route('show_product',$product->id)}}" class="btn btn-primary">Show</a>
                    <a href="{{route('edit_product',$product->id)}}" class="btn btn-success">Edit</a>
                   
                    <a  href="{{route('delete_product',$product->id)}}" class="btn btn-danger">Delete</a>
                    @csrf
                    @method('DELETE')
                  
      
                </td>
            </tr>
            @endforeach
          
        </tbody>
    </table>
        </form>

@endsection
