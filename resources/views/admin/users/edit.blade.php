@extends('layouts.app_admin')

<link rel="stylesheet" type="text/css" href="{{ asset('/admin/css/edit_user.css') }}" />

@section('content')
    <!-- Enctype send multiple/different form data(image and text) -->
    <form action="/admin/users/{{$user->id}}" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
        {{ csrf_field() }}
        @method('PUT')

        <!-- Name -->
        <div class="form-group">
            <label for="name">Name</label>
            <input class="form-control" type="text" name="name" value="{{$user->name}}">
        </div>
        <!-- Email -->
        <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" type="text" name="email" value="{{$user->email}}">
        </div>
        <!-- Roles -->
        <div class="form-group">
            <label for="role">Role</label>
            <select name="role" id="role">
                <option value="subscriber">{{$user->role}}</option>
                @if($user->role == 'admin')
                    <option value='subscriber'>Subscriber</option>;

                @else {
                    <option value='admin'>Admin</option>;
                }
                @endif

            </select>
        </div>
        <!-- Birthday -->
        <div class="form-group">
            <label for="birthday">Birthday</label>
            <input class="form-control" type="date" name="birthday" value="{{$user->birthday}}">
        </div>
        <!-- University -->
        <div class="form-group">
            <label for="university">University</label>
            <input class="form-control" type="text" name="university" value="{{$user->university}}">
        </div>
        <!-- Program -->
        <div class="form-group">
            <label for="program">Program</label>
            <input class="form-control" type="text" name="program" value="{{$user->program}}">
        </div>

        <div class="form-group">
            <input class="btn" type="submit" name="edit_user" value="Update User">
        </div>
    </form>
@stop

@section('js')
    <script type="text/javascript" src="/admin/js/users.js"></script>

@stop
