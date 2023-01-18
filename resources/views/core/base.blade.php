<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>
<body>
    @include('shared.header.index')
    @yield('content')
    @include('shared.footer.index')
</body>
</html>