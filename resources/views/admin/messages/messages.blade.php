{{--<!DOCTYPE html>--}}
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
{{--<head>--}}
{{--    <meta charset="utf-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1">--}}

{{--    <title>Messages</title>--}}

{{--    <!-- Fonts -->--}}
{{--    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">--}}

{{--    <!-- Styles -->--}}

{{--</head>--}}
{{--<body>--}}
{{--<div class="flex-center position-ref full-height">--}}
{{--    @if (Route::has('login'))--}}
{{--        <div class="top-right links">--}}
{{--            @auth--}}
{{--                <a href="{{ url('/home') }}">Home</a>--}}
{{--            @else--}}
{{--                <a href="{{ route('login') }}">Login</a>--}}

{{--                @if (Route::has('register'))--}}
{{--                    <a href="{{ route('register') }}">Register</a>--}}
{{--                @endif--}}
{{--            @endauth--}}
{{--        </div>--}}
{{--    @endif--}}

{{--    <div class="content">--}}
{{--        <div>--}}
{{--            <ul>--}}
{{--            @foreach($messages as $message){--}}
{{--                <li>--}}
{{--                    {{$message}}--}}
{{--                </li>--}}
{{--            @endforeach--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--</body>--}}
{{--</html>--}}

@extends('layouts.app_admin')

<link rel="stylesheet" type="text/css" href="{{ asset('/admin/css/messages.css') }}" />


    <!-- Header -->
<!--    --><?php //include 'includes/admin_header.php'; ?>
@section('content')
        <!-- Table -->
        <table class="table table-bordered table-hover">
            <thead>
            <!-- Columns -->
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Date</th>
            </tr>
            </thead>
            <tbody>
            <!-- GET ALL MESSAGES -->
            @foreach($messages as $message){
                <tr>

                    <td>{{$message->id}}</td>
                    <td>{{$message->user->name}}</td>
                    <td>{{$message->user->email}}</td>
                    <td>{{$message->subject}}</td>
                    <td>{{$message->message}}</td>
                    <td>{{$message->date}}</td>

                    <td>
                        <form action="/admin/messages/{{$message->id}}" method="post">
                            {{csrf_field()}}
                            @method('DELETE')
                            <input type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
            @endforeach


            </tbody>
        </table>
@stop
