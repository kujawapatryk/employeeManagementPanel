<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Nawigacja</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

    <div class="flex flex-col items-center justify-center min-h-screen ">
        <nav class="bg-blue-500 p-4 mx-auto max-w-screen-xl rounded mb-8">
            <ul class="flex space-x-4">
                <li class="nav-item active">
                    <a class="text-white px-4 py-2 rounded-full" href="{{route('employees.list')}}">Wszyscy Pracownicy</a>
                </li>
                <li class="nav-item">
                    <a class="text-white px-4 py-2 rounded-full" href="{{route('employees.create')}}">Dodaj pracownika</a>
                </li>
{{--                <li class="nav-item">--}}
{{--                    <a class="text-white px-4 py-2 rounded-full" href="#">Firmy</a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="text-white px-4 py-2 rounded-full" href="#">Preferencje żywieniowe</a>--}}
{{--                </li>--}}
            </ul>
        </nav>

        <div class="container mx-auto p-6 bg-white shadow-lg rounded-lg max-w-screen-xl">
            @include('components.alerts')
            @yield('content')
        </div>
    </div>

</body>

</html>
