@extends('layouts.master')
@section('title', 'Our Team')
@section('css', 'aboutus')

@section('content')
    <div class="wrapper">
        <h1>Our Team</h1>
        <div class="team">
            <div class="team_member">
                <div class="team_img">
                    <img src="IDPic.jpeg" alt="Team_image">
                </div>
                <h3>Beatrice Forslund</h3>
                <p class="smallinfo">Software Engineering Student at Fontys University of Applied Sciences</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est quaerat tempora, voluptatum quas facere dolorum aut cumque nihil nulla harum nemo distinctio quam blanditiis dignissimos.</p>
            </div>
            <div class="team_member">
                <div class="team_img">
                    <img src="img/rawan.jpg" alt="Team_image">
                </div>
                <h3>Rawan Abou Dehn</h3>
                <p class="smallinfo">Software Engineering Student at Fontys University of Applied Sciences</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est quaerat tempora, voluptatum quas facere dolorum aut cumque nihil nulla harum nemo distinctio quam blanditiis dignissimos.</p></div>
        </div>
    </div>
@endsection
