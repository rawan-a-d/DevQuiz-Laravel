@extends('layouts.app_admin')

@section('title')
    Users
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/admin/css/admin.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/admin/css/users.css') }}" />
@endsection


@section('content')

    @if(session('message'))
        <div class="error-msg">
            <i class="fa fa-times-circle"></i>
            {{session('message')}}
        </div>
    @elseif(session('question-created-message'))
        <div class="success-msg">
            <i class="fa fa-check"></i>
            {{session('question-created-message')}}
        </div>
    @elseif(session('question-updated-message'))
        <div class="success-msg">
            <i class="fa fa-check"></i>
            {{session('question-updated-message')}}
        </div>
    @elseif(session('user-role-admin-message'))
        <div class="info-msg">
            <i class="fa fa-info-circle"></i>
            {{session('user-role-admin-message')}}
        </div>
    @elseif(session('user-role-sub-message'))
        <div class="info-msg">
            <i class="fa fa-info-circle"></i>
            {{session('user-role-sub-message')}}
        </div>
    @endif

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
            <td><a href="{{route('users.edit', $user->id)}}">Edit</a></td>
            <td>
                <form action="/admin/users/{{$user->id}}" method="post">
                    {{csrf_field()}}
                    @method('DELETE')
                    <input type="submit" value="Delete">
                </form>
            </td>
        </tr>
        @endforeach

        </tbody>
    </table>
    {{$users->links()}}

@endsection

