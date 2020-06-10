@extends('layouts.app_admin')

<link rel="stylesheet" type="text/css" href="{{ asset('/admin/css/add_edit.css') }}" />

@section('content')
    <form action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <!-- Name -->
        <div class="form-group">
            <label for="name">Name</label>
            <input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <!-- Email -->
        <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" type="text" name="email" id="email" value="{{ old('email') }}">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <!-- Role -->
        <div class="form-group">
            <label for="role">Role</label>
            <select name="role" id="role">
                <option value="subscriber">Select a role</option>
                <option value="subscriber">subscriber</option>
                <option value='admin'>Admin</option>
            </select>
            @error('role')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <!-- Password -->
        <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" type="text" name="password" id="password" value="{{ old('password') }}">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <!-- Birthday -->
        <div class="form-group">
            <label for="birthday">Birthday</label>
            <input class="form-control" type="date" name="birthday" value="{{ old('birthday') }}">
            @error('birthday')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <!-- University -->
        <div class="form-group">
            <label for="university">University</label>
            <input class="form-control" type="text" name="university" value="{{ old('university') }}">
            @error('university')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <!-- Program -->
        <div class="form-group">
            <label for="program">Program</label>
            <input class="form-control" type="text" name="program" value="{{ old('program') }}">
            @error('program')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="create_user" value="Add User">
        </div>
    </form>
@endsection
