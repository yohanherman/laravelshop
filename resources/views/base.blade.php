<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    {{-- <title>Document</title> --}}
</head>
<header>

</header>
<body>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>