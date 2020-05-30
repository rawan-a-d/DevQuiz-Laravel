@extends('layouts.master')

@section('sessions')
    @parent
    <?php
{{--/* Include classes */--}}
{{--include_once("../../includes/autoload.inc.php");--}}

{{--$controller = new UserController();--}}
{{--$userdata=$controller->getUser($_SESSION['userId']);--}}
{{--$birthday=$userdata['birthday'];--}}
{{--$university=$userdata['university'];--}}
{{--$program=$userdata['program'];--}}
    ?>
@endsection



@section('title', 'Profile')
@section('css', 'profile')

@section('content')
    <div class="wrapper">
        <div class="left">
            <img src="img/IDPic.jpeg"
                 alt="user" width="100">
            <h4>{{$username}}</h4>

        </div>
        <div class="right">
            <div class="info">
                <div class="info_data">
                    <div class="data">
                        <h4>Email</h4>
                        <p>{{$email}}</p>
                    </div>
                    <div class="data">
                        <h4>Birthday</h4>
                        <p>{{$birthday}}</p>
                    </div>
                </div>
            </div>

            <div class="bottom">
                <div class="bottom_data">
                    <div class="data">
                        <h4>University</h4>
                        <p>{{$university}}</p>
                    </div>
                    <div class="data">
                        <h4>Progamming languages</h4>
                        <p>{{$program}}.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
