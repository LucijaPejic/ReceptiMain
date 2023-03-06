@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <title>Recepti</title>


</head>

<body>
    <welcome-page></welcome-page>

</body>

</html>
@endsection