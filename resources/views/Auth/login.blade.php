<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{ URL('assets/images/favicon.ico') }}">
    <title>
        Login
    </title>
    <link href="{{ URL('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL('assets/icons/all.min.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;600&family=Roboto:wght@100&display=swap"
        rel="stylesheet">
    <link href="{{ URL('assets/css/style.css') }}" rel="stylesheet">
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-5">
                <div class="wrap">
                    <div class="login-wrap p-4 p-md-5">
                        <div class="d-flex flex-column">
                            <div class="w-100">
                                <h3 class="mb-4 text-center">Login</h3>
                            </div>

                            @if($errors->any())
                            <div class="alert alert-danger">{{$errors->first()}}</div>
                            @endif

                        </div>
                        <form action="{{ route('login.submit') }}" method="post" >
                            @csrf
                            <div class="card p-5 rounded">
                                <div class="form-group mt-3">
                                    <input autofocus type="text" name="email" value="{{ old('email') }}" class="form-control" required>
                                    <small id="slugHelp" class="form-text text-muted">Email</small>
                                </div>
                                <div class="form-group mt-4">
                                    <input id="password-field" type="password" name="password" class="form-control" required>
                                    <small id="slugHelp" class="form-text text-muted">Password</small>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary rounded submit px-3 mt-4">Entrar</button>
                                </div>
                                <div class="form-group d-md-flex mt-5">
                                    <div class="w-50 text-left">
                                        <label class="checkbox-wrap checkbox-primary mb-0 cursor-pointer">Recordar
                                            <input type="checkbox" name="remember" >
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="w-50 text-md-right">
                                        <a href="#">Olvide mi clave</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
