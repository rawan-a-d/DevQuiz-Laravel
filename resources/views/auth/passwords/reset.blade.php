@extends('layouts.master')

@section('title', 'Reset password')
@section('css', 'profile')


@section('content')
    <!-- Enctype send multiple/different form data(image and text) -->
    <form action="{{route('password.update')}}" method="post" enctype="multipart/form-data" id="udpate_info_form">
    {{ csrf_field() }}
    @method('PUT')

        <!-- Current password -->
        <div class="form-group">
            <label for="current_password">Current password</label>
            <input class="form-control" type="password" name="current_password" value="{{ old('current_password') }}">
            @error('current_password')
            <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
            @enderror
        </div>
        <!-- New Password -->
        <div class="form-group">
            <label for="password">New password</label>
            <input  class="credentials @error('password') is-invalid @enderror" id="password" type="password" name="password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <!-- Password confirmation -->
        <div class="form-group">
            <label for="password">Password confirmation</label>
            <input  class="credentials @error('password_confirmation') is-invalid @enderror" id="confirmPassword" type="password" name="password_confirmation">
            @error('password_confirmation')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div id="wrapper">
            <button class="btn" type="submit" name="update_password">Update Password</button>
        </div>
    </form>

@endsection
