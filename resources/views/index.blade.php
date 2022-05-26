<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <style>
            {
                padding:0;
                margin:0;
                
            }
            .container
            {
                border:2px solid blue;
                padding:0px;
            }
          
        </style>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"  crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" " crossorigin="anonymous"></script>
    <title>E-STORE</title>
</head>
    
<body class="jumbotron t-5">
    <div class="container text-center mt-3 p-0 ">
        <h2 class="bg-primary text-center mb-5 pb-1">E-Store</h2>
        
            @if ($message = Session::get('stored'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif

        
       
            <form action="{{route('login')}}" method="get" >
                {{csrf_field()}}
                @csrf
                <div class="colomn">
                    <div class="inputemail" >
                        @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                        <label for="email">
                            Email:
                        </label>
                        <input type="email" class="mb-3" name="email" id="email" >
                    </div>
                    
                    <div class="inputpassword" >
                    @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                        <label for="password" >
                            Password:
                        </label>
                        <input type="password" class="mb-3" name="password" id="password" >
                       
                    </div>

                    <button type="submit" class="btn btn-primary mb-3">Login</button>

                </div>
            </form>
       
       
    </div>

    <div class="container text-center mt-3 p-3">
        <form action="" method="get">
            <a href="{{route('registration')}}"" class="btn btn-primary">Register Now!</a>
        </form>
    </div>
</body>
</html>