@extends('layouts.master')

@section('sessions')
    @parent
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>



@section('title', 'Profile')
@section('css', 'profile')

@section('content')
    <div class="wrapper">
        <div class="left">
            <img src="/storage/avatars/{{$user->avatar}}"
                 alt="user" width="100" id="img">
            <form method = POST action = "/profile/{{$user->id}}" enctype="multipart/form-data">
                @csrf
                <input type = "file" name= "avatar" id = "avatar">
                <button type="submit">Upload</button></form>
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
<script>

    $(document).ready(function(){
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#img').attr('src', e.target.result);
                }
            }
        }

        $("#avatar").change(function() {
            readURL(this);
        });
    });

</script>
