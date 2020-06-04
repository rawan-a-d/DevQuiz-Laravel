@extends('layouts.master')

@section('sessions')
    @parent
    <?php

//$userdata=user($_SESSION['userId']);
    ?>
@endsection



@section('title', 'Profile')
@section('css', 'profile')

@section('content')
    <div class="wrapper">
        <div class="left">
            <img src="img/IDPic.jpeg"
                 alt="user" width="100">
            <h4>{{$user->name}}</h4>

        </div>
        <div class="right">
            <div class="info">
                <div class="info_data">
                    <div class="data">
                        <h4>Email</h4>
                        <p>{{$user->email}}</p>
                    </div>
                    <div class="data">
                        <h4>Birthday</h4>
                        <p>{{$user->birthday}}</p>
                    </div>
                </div>
            </div>

            <div class="bottom">
                <div class="bottom_data">
                    <div class="data">
                        <h4>University</h4>
                        <p>{{$user->university}}</p>
                    </div>
                    <div class="data">
                        <h4>Progamming languages</h4>
                        <p>{{$user->program}}.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
