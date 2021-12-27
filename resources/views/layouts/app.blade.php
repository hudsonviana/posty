<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posty - curso</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-gray-200">

    <nav class="p-6 bg-white flex justify-between mb-6">
        <ul class="flex items-center">
            <li class="p-3"><a href="/">Home</a></li>
            <li class="p-3"><a href="#">Dashboard</a></li>
            <li class="p-3"><a href="#">Post</a></li>
        </ul>
        <ul class="flex items-center">
            @auth
                <li class="p-3"><a href="#">Hudson Andrade</a></li>
                <li class="p-3">
                    {{-- <a href="{{ route('logoutName') }}">Sair</a> --}}
                    <form action="{{ route('logoutName') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit">Sair</button>
                    </form>
                </li>
            @endauth

            @guest
                <li class="p-3"><a href="{{ route('loginName') }}">Login</a></li>
                <li class="p-3"><a href="{{ route('registerName') }}">Register</a></li>
            @endguest
        </ul>
    </nav>

    @yield('content')
</body>
</html>