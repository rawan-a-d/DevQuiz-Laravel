@extends('layouts.app_admin')

<link rel="stylesheet" type="text/css" href="{{ asset('/admin/css/users.css') }}" />


@section('content')
    <!-- Table -->
    <table class="table table-bordered table-hover">
        <thead>
        <!-- Columns -->
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>University</th>
            <th>Birthdate</th>
            <th>Program</th>

        </tr>
        </thead>
        <tbody>

        @foreach ($users as $user)

        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->role}}</td>
            <td>{{$user->university}}</td>
            <td>{{$user->birthday}}</td>
            <td>{{$user->program}}</td>

            <td>
                <form action="/admin/users/{{$user->id}}/admin" method="post">
                    {{csrf_field()}}
                    @method('PUT')
                    <input type="submit" value="Admin">
                </form>
            </td>
            <td>
                <form action="/admin/users/{{$user->id}}/subscriber" method="post">
                    {{csrf_field()}}
                    @method('PUT')
                    <input type="submit" value="Subscriber">
                </form>
            </td>
    {{--        <td><a href='users.php?change_to_admin=<?php echo $id ?>'>Admin</a></td>--}}
    {{--        <td><a href='users.php?change_to_sub=<?php echo $id ?>'>Subscriber</a></td>--}}
            <td><a href="{{route('users.edit', $user->id)}}">Edit</a></td>
            <td>
                <form action="/admin/users/{{$user->id}}" method="post">
                    {{csrf_field()}}
                    @method('DELETE')
                    <input type="submit" value="Delete">
                </form>
            </td>
    {{--        <td><a href="{{route('users.destroy', $user->id)}}">Delete</a></td>--}}

        </tr>
        @endforeach


        </tbody>
    </table>
@stop
