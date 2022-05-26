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
                box-sizing:border-box;
                
            }
            .container
            {
                border:2px solid blue;
                padding:0px;
                text-align:center;
            }
         
          
        </style>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"  crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" " crossorigin="anonymous"></script>
    <title>E-STORE</title>
</head>
    
<body class="jumbotron t-5 text-center">
    <div class="container text-center mt-5 p-0 ">
        <h2 class="bg-primary text-center mb-3 pb-1"> Customer Registration</h2>

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
        
        <form action="{{ route('store_customer') }}" method="get" >
            @csrf
                <div class="colomn">

                <div class="form-group" >
                        <label for="name">
                            Name:
                        </label>
                        <input type="text" class="mb-3" name="name" id="name" >
                       
                    </div>
                    <div class="form-group" >
                        <label for="email">
                            Email:
                        </label>
                        <input type="email" class="mb-3" name="email" id="email" >
                       
                    </div>

                    <div class="form-group">
                        <label for="genter">Genter:</label>
                        <select class="form-select" id="genter" name='genter'>
                            <option value="male" >Male</option>
                            <option value="female" >Female</option>
                        </select>
                    </div>

                    <div class="form-group" >
                        <label for="address" >
                            Address:
                        </label>
                        <input type="text" class="mb-3" name="address" id="address">
                    </div>

                    <div class="form-group" >
                        <label for="mobile" >
                            Mobile:
                        </label>
                        <input type="text" class="mb-3" name="mobile" id="mobile">
                    </div>

                    <div class="form-group" >
                        <label for="password" >
                            Password:
                        </label>
                        <input type="password" class="mb-3" name="password" id="password">
                    </div>
                    <button type="submit" class="btn btn-primary mb-3">Log Up</button>

                </div>
            </form>
    </div>

</body>
</html>