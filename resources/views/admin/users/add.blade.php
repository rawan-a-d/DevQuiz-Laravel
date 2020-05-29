@extends('layouts.app_admin')

<link rel="stylesheet" type="text/css" href="{{ asset('/admin/css/edit_user.css') }}" />

@section('content')
    <form action="/admin/users" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
        {{ csrf_field() }}
        <!-- Name -->
        <div class="form-group">
            <label for="name">Name</label>
            <input class="form-control" type="text" name="name" id="name">
        </div>
        <!-- Display errors -->
        <div class="error" id="nameErr">
        </div>
        <!-- Email -->
        <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" type="text" name="email" id="email">
        </div>
        <!-- Display errors -->
        <div class="error" id="emailErr">
        </div>
        <!-- Role -->
        <div class="form-group">
            <label for="role">Role</label>
            <select name="role" id="role" value="subscriber">
                <option value="subscriber">Select a role</option>
                <option value="subscriber">subscriber</option>
                <option value='admin'>Admin</option>
            </select>
        </div>
        <!-- Password -->
        <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" type="text" name="password" id="password">
        </div>
        <!-- Display errors -->
        <div class="error" id="passwordErr">
        </div>
        <!-- Birthday -->
        <div class="form-group">
            <label for="birthday">Birthday</label>
            <input class="form-control" type="date" name="birthday">
        </div>
        <!-- University -->
        <div class="form-group">
            <label for="university">University</label>
            <input class="form-control" type="text" name="university">
        </div>
        <!-- Program -->
        <div class="form-group">
            <label for="program">Program</label>
            <input class="form-control" type="text" name="program">
        </div>
        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="create_user" value="Add User">
        </div>
    </form>
@stop

@section('js')
    <script type="text/javascript" src="/admin/js/users.js"></script>

@stop
