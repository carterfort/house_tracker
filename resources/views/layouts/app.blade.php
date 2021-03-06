<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{env('HOUSE_NAME')}}</title>

    <link rel="stylesheet" href="/css/app.css" />
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>


</head>
<body id="app-layout">
    
    @include('navbar')

    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="container">
        @yield('main')
    </div>

</body>
</html>
