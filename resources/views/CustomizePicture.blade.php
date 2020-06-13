@extends('layouts.master')
@section('title', 'Modify Your picture')
@section('css', 'aboutus')

@section('content')
    <div class="team">
        <div class="team_member">

                <form method = POST action = "/customize" enctype="multipart/form-data">
                    @csrf
                    <input type = "file" name= "avatar" id = "avatar">
                    <button class="btn" type="submit" >Upload</button>
                    <img src="/storage/avatars/{{$user->avatar}}"
                         alt="user" width="130" id="img">
                </form>


            <button onclick="window.location='/grey'" class="btn" type="submit" >Grey</button>
            <button onclick="window.location='/pixalate'" class="btn" type="submit" >Pixelate</button>
            <p> To redo your changes, you have to upload your picture again.</p>
        </div>
    </div>
@endsection
