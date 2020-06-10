@extends('layouts.app_admin')

<link rel="stylesheet" type="text/css" href="{{ asset('/admin/css/add_edit.css') }}" />

@section('content')
    <!-- Enctype send multiple/different form data(image and text) -->
    <form action="{{route('users.update', $user->id)}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        @method('PUT')

        <!-- Name -->
        <div class="form-group">
            <label for="name">Name</label>
            <input class="form-control" type="text" name="name" value="{{$user->name}}">
            @error('name')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <!-- Email -->
        <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" type="text" name="email" value="{{$user->email}}">
            @error('email')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
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
            @error('role')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <!-- Birthday -->
        <div class="form-group">
            <label for="birthday">Birthday</label>
            <input class="form-control" type="date" name="birthday" value="{{$user->birthday}}">
            @error('birthday')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <!-- University -->
        <div class="form-group">
            <label for="university">University</label>
            <input class="form-control" type="text" name="university" value="{{$user->university}}">
            @error('university')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <!-- Program -->
        <div class="form-group">
            <label for="program">Program</label>
            <input class="form-control" type="text" name="program" value="{{$user->program}}">
            @error('program')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <input class="btn" type="submit" name="edit_user" value="Update User">
        </div>
    </form>
@stop

@section('js')
    <script type="text/javascript" src="{{asset('/admin/js/users.js')}}"></script>

@stop
