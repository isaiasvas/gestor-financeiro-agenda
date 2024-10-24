<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{asset('loginpublic/css/style.css')}}">

</head>

<body class="img js-fullheight" style="background-image: url(brand/full-screen-image-3.jpg);">
    <section class="ftco-section">
        <div class="container ">
            <div class="row justify-content-center logins ">
                <div class="col-md-6 col-lg-4  ">
                    <div class="login-wrap p-0 ">
                        <form action="{{route('login')}}" method="POST" class="signin-form">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Email" value="admin@example.com" required>
                            </div>
                            <div class="form-group">
                                <input id="password-field" type="password" name="password" value="admin" class="form-control" placeholder="Senha" required>
                                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary submit px-3">Acessar</button>
                            </div>
                            <div class="form-group d-md-flex">
                                <div class="w-50">
                                    <label class="checkbox-wrap checkbox-primary">Lembrar-me
                                        <input type="checkbox" checked>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="w-50 text-md-right">
                                    <a href="#" style="color: #fff">Esqueci a senha</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('loginpublic/js/jquery.min.js')}}"></script>
    <script src="{{ asset('loginpublic/js/popper.js')}}"></script>
    <script src="{{ asset('loginpublic/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('loginpublic/js/main.js')}}"></script>

</body>

</html>