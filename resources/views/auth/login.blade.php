@extends('layouts.app_login')

@section('title')
    Login
@endsection

@section('content')

    <div id="container">
        <form action="{{route('login')}}" method="POST">
            {{ csrf_field() }}
            <!-- Two inputs for credentials -->
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

            <!-- Remember me -->
            <input id="remember_me" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label for="remember_me">Remember me</label>

            <!-- Buttons login and sign up -->
            <div id="wrapper">
                <button id="login" type="submit" name="submit">
                    <a>
                        Login
                    </a>
                </button>
                <button id= "signup">
                    <a href="register">
                        Sign up
                    </a>
                </button>
            </div>
        </form>
    </div>

@endsection
