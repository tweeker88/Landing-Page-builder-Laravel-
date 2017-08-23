<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{asset('Trumbowyg-master/dist/trumbowyg.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('Trumbowyg-master/dist/ui/trumbowyg.min.css')}}">
    <script type="text/javascripts" src="{{asset('/bootstrap.min.js')}}"></script>
</head>
<body>
<header class="header_wrapper">
@yield('header')
    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
            </ul>
        </div>
        @endif
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
</header>
@yield('content')
</body>
</html>