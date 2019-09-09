<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Document</title>

    <link href="{{asset('css/app.css')}}" rel="stylesheet">

</head>

<body>

<div id="app">

    <vue-login></vue-login>
    <vue-register></vue-register>

    @auth
        <div class="d-flex justify-content-end align-items-center">
            <span class="mr-3">Hi, {{auth()->user()->name}}</span>
            <button type="button" class="btn btn-light" @click="logout">Logout</button>
        </div>
    @endauth

    @guest
        <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-light" data-toggle="modal" data-target="#login-modal">Login</button>
            <button type="button" class="btn btn-light" data-toggle="modal" data-target="#register-modal">Register
            </button>
        </div>
    @endguest
    <div class="d-flex justify-content-end">
        @yield('content')
        <div class="d-flex flex-column ">
            @auth
            <a href="{{route('threads.create')}}" class="btn btn-light btn-outline-secondary text-center mt-3"
               style="margin-right: 20px">New thread</a>
            @endauth
            <a href="{{route('threads.index')}}" class="btn btn-light btn-outline-secondary text-center mt-3"
               style="margin-right: 20px">All threads</a>

        </div>
    </div>


</div>

<script>
    window.Auth = {!! json_encode([
    'signedIn' => \Illuminate\Support\Facades\Auth::check(),
    'user' => \Illuminate\Support\Facades\Auth::user(),
    ]) !!};
</script>

<script src="{{asset('js/app.js')}}"></script>


</body>
</html>
