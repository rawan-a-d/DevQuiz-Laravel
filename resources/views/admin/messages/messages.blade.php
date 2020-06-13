@extends('layouts.app_admin')

@section('title')
    Messages
@endsection


@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/admin/css/admin.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/admin/css/messages.css') }}" />
@endsection

<!-- Header -->
@section('content')
    @if(session('message'))
        <div class="error-msg">
            <i class="fa fa-times-circle"></i>
            {{session('message')}}
        </div>
    @endif
    <!-- Table -->
    <table class="table table-bordered table-hover">
        <thead>
        <!-- Columns -->
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Subject</th>
            <th>Message</th>
            <th>Date</th>
        </tr>
        </thead>
        <tbody>
        <!-- GET ALL MESSAGES -->
        @foreach($messages as $message){
            <tr>

                <td>{{$message->id}}</td>
                <td>{{$message->user->name}}</td>
                <td>{{$message->user->email}}</td>
                <td>{{$message->subject}}</td>
                <td>{{$message->message}}</td>
                <td>{{$message->created_at->format('d M Y')}}</td>

                <td>
                    <form action="{{route('messages.destroy', $message->id)}}" method="post">
                        {{csrf_field()}}
                        @method('DELETE')
                        <input type="submit" value="Delete">
                    </form>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>


    {{$messages->links()}}
@endsection
