@extends('layouts.master')

@section('title', 'Profile')
@section('css', 'profile')

@section('content')
    @if(session('suceess_message'))
        <div class="success-msg">
            <i class="fa fa-check"></i>
            {{session('suceess_message')}}
        </div>
    @elseif(session('profile-updated-message'))
        <div class="success-msg">
            <i class="fa fa-check"></i>
            {{session('profile-updated-message')}}
        </div>
    @endif

    <!-- Enctype send multiple/different form data(image and text) -->
    <form action="{{route('profile.update', $user->id)}}" method="post" enctype="multipart/form-data" id="udpate_info_form">
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

        <div id="wrapper">
            <button class="btn" type="submit" name="edit_user">Update User</button>
            <button class="btn"><a href="{{route('password.request')}}">Reset password?</a></button>
        </div>
    </form>

@endsection
