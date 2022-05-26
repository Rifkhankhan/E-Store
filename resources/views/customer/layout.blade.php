<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"  crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" " crossorigin="anonymous"></script>
    <title>E-STORE</title>
</head>
<body class="container bg-light  p-0 mb-0 mt-0">

    <h2 class="text-center text-light bg-dark mt-5 pt-2 pb-2 rounded">E-Store</h2>
    <nav class="navbar navbar-expand-sm bg-warning navbar-light">
        <ul class="navbar-nav ">
            <li class="nav-item pl-3">
            <a class="nav-link" href="{{route('customer_dashboard',$customer->id)}}">Customer Name</a>
            </li>
            <li class="nav-item pl-3">
            <a class="nav-link" href="{{route('customers_orders',$customer->id)}}">Place Orders</a>
            </li>
            <li class="nav-item pl-3">
            <a class="nav-link" href="{{route('customers_myorders',$customer->id)}}">My Orders</a>
            </li>
            <li class="nav-item pl-3">
            <a class="nav-link " href="{{route('logout')}}">Logout</a>
            </li>
        </ul>
    </nav>

    <div class="container  pt-3 pl-0">
         @yield('content')
    </div>
    
    
</body>
</html>