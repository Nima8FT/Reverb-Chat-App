<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>
        window.userId = {{ $user->id }};
    </script>
</head>
<body class="bg-gray-800 w-full h-screen flex justify-center items-center">

<div class="bg-gray-100 w-1/2 max-w-[700px] flex justify-center items-center flex-wrap rounded-lg max-h-[800px]">

    @yield('content')

</div>

@stack('scripts')
</body>
</html>
