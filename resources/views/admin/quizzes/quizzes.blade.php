@extends('layouts.app_admin')

<link rel="stylesheet" type="text/css" href="{{ asset('/admin/css/users.css') }}" />


@section('content')
    <!-- Table -->
    <table class="table table-bordered table-hover">
        <thead>
        <!-- Columns -->
        <tr>
            <th>Id</th>
            <th>Subject</th>
            <th>Question</th>
            <th>Answer 1</th>
            <th>Answer 2</th>
            <th>Answer 3</th>
            <th>Answer 4</th>
            <th>Correct answer</th>
            <th>Level</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($questions as $question)

            <tr>
                <td>{{$question->id}}</td>
                <td>{{$question->subject->name}}</td>
                <td>{{$question->question}}</td>
                <td>{{$question->ans_a}}</td>
                <td>{{$question->ans_b}}</td>
                <td>{{$question->ans_c}}</td>
                <td>{{$question->ans_d}}</td>
                <td>{{$question->answer}}</td>
                <td>{{$question->level}}</td>
                <td><a href="{{route('quizzes.edit', $question->id)}}">Edit</a></td>
                <td>
                    <form action="/admin/quizzes/{{$question->id}}" method="post">
                        {{csrf_field()}}
                        @method('DELETE')
                        <input type="submit" value="Delete">
                    </form>
                </td>
{{--                <td>--}}
{{--                    <form action="/admin/quizzes/{{$user->id}}" method="post">--}}
{{--                        {{csrf_field()}}--}}
{{--                        @method('DELETE')--}}
{{--                        <input type="submit" value="Delete">--}}
{{--                    </form>--}}
{{--                </td>--}}
                {{--        <td><a href='users.php?change_to_admin=<?php echo $id ?>'>Admin</a></td>--}}
                {{--        <td><a href='users.php?change_to_sub=<?php echo $id ?>'>Subscriber</a></td>--}}
{{--                <td><a href="{{route('users.edit', $user->id)}}">Edit</a></td>--}}
{{--                <td>--}}
{{--                    <form action="/admin/users/{{$user->id}}" method="post">--}}
{{--                        {{csrf_field()}}--}}
{{--                        @method('DELETE')--}}
{{--                        <input type="submit" value="Delete">--}}
{{--                    </form>--}}
{{--                </td>--}}
                {{--        <td><a href="{{route('users.destroy', $user->id)}}">Delete</a></td>--}}

            </tr>
        @endforeach


        </tbody>
    </table>
@stop
