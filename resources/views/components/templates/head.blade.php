<!DOCTYPE html>
<html lang="tr">
<head>

    <meta charset="UTF-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Template | {{ $title }} </title>
    @vite('resources/css/app.css')

</head>
<body class="bg-white text-base font-sans">
