@extends('layouts.app_login')

@section('title')
    Register
@endsection

@section('content')

    <div id="container">
        <form id="form" action="{{route('register')}}" method="POST">
        {{ csrf_field() }}
            <!-- Three inputs for credentials -->
            <input class="credentials @error('name') is-invalid @enderror" id="name" type="text" name="name" placeholder="Name" value="{{ old('name') }}"  autocomplete="username">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <input class="credentials @error('email') is-invalid @enderror" id="email" type="email" name="email" placeholder="E-mail address" value="{{ old('email') }}">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <input  class="credentials @error('password') is-invalid @enderror" id="password" type="password" name="password" placeholder="Password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <input  class="credentials @error('password_confirmation') is-invalid @enderror" id="confirmPassword" type="password" name="password_confirmation" placeholder="Repeat password">
            @error('password_confirmation')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <!-- Buttons login and sign up -->
            <div id="wrapper">
                <button id="login">
                    <a href="login">
                        Login
                    </a>
                </button>
                <button id= "signup" type="submit" name="submit">
                    Sign up
                </button>
            </div>
        </form>
    </div>
@endsection
