<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    
    <link rel="stylesheet" href="{{ URL::asset('addon/css/myStyles.css') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ URL::asset('addon/bootstrap/css/bootstrap.css')}}">

    <!-- Fontawesome Css -->
    <link rel="stylesheet" href="{{ URL::asset('addon/fontawesome/css/all.min.css') }}">
</head>
<body>
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="#">E-Laundry</a>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 margin-top-100">

                @if (session('gagal-login'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('gagal-login')}}

                        <a href="{{ route('login') }}" style="float: right;"> 
                            x
                        </a>
                    </div>  
                @endif
                @if (session('sukses-logout'))
                    <div class="alert alert-success" role="alert">
                        {{ session('sukses-logout')}}

                        <a href="{{ route('login') }}" style="float: right;"> 
                            x
                        </a>
                    </div>  
                @endif
                <div class="card">
                    <div class="card-header text-center">
                        LOGIN
                    </div>
                    <div class="card-body">
                        <form action="{{ url('proses-login') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-block btn-primary">
                                Login
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap SCRIPTS -->
    <script src="{{ URL::asset('addon/datatables/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ URL::asset('addon/bootstrap/js/bootstrap.min.js') }}"></script>
</body>
</html>
