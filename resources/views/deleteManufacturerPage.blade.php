<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite('resources/css/app.css')

    <!-- Styles -->
    <style>
    </style>
</head>
<body class="antialiased p-8">
<h1>DELETE MANUFACTURER BY ID: {{$id}}   ???</h1>
<form action="/manufacturer-delete/{{$id}}" method="POST">
    @csrf
    @method('DELETE')

    <button class="border-2 border-black p-2">YES I WANT TO DELETE THIS NOW!!!!!!!!!!!!!!!!!!!!</button>
</form>
</body>
</html>
