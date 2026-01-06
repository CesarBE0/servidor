<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    @vite("resources/css/app.css")
</head>
<body class="bg-gray-50 min-h-screen">
<x-layouts.header />

<nav class="bg-white border-b border-gray-200 py-3 px-10 flex gap-5">
    <a href="{{route('about')}}" class="text-gray-600 hover:text-blue-500 text-sm">About</a>
    <a href="{{route('noticias')}}" class="text-gray-600 hover:text-blue-500 text-sm">Noticias</a>
</nav>

<main class="p-10">
    {{ $slot }}
</main>
</body>
</html>
