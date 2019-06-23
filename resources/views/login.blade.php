<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
</head>
<body>
<div class="login-page">
    <div class="form">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(session('message'))
            <span>{{session('message')}}</span>
            @endif
        <form class="login-form" action="{{route('user.login')}}" method="post">
            @csrf
            <input name="email" value="{{old('email')}}" type="email" placeholder="email"/>
            <input name="password" type="password" placeholder="password"/>
            <button>login</button>
        </form>
    </div>
</div>
</body>
</html>