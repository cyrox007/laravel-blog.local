<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App -- @yield("title")</title>
    @vite(['resources/js/auth.js', 'resources/css/auth.css'])
</head>
<body>
    @yield("content")
</body>
</html>