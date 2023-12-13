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
    @if ($errors->any())
        <div class="text-red-600">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h1>HELlo</h1>
    <form action="{{ route('main') }}" method="GET">
        <label for="manufacturer">Manufacturer country:</label>
        <input class="border-2 border-black" type="text" name="country" value="{{ request('manufacturer') }}">
    </form>
    <ul class="mt-8">
        @foreach($manufacturers as $manufacturer)
            <li>
                <h2>{{$manufacturer->brand}}</h2>
                <h2>{{$manufacturer->country}}</h2>
                <h2>{{$manufacturer->email}}</h2>
                <h2>{{$manufacturer->contact_phone}}</h2>
                <button class="text-red-600"><a href="/manufacturer-delete/{{$manufacturer->id}}">Delete</a></button>
            </li>
        @endforeach
    </ul>
</body>
</html>
