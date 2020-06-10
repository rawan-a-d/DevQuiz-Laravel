@extends('layouts.app_admin')

@section('title')
    Quizzes
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/admin/css/admin.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/admin/css/quizzes.css') }}" />
@endsection


@section('content')

    @if(session('message'))
        <div class="error-msg">
            <i class="fa fa-times-circle"></i>
            {{session('message')}}
        </div>
    @elseif(session('question-created-message'))
        <div class="success-msg">
            <i class="fa fa-check"></i>
            {{session('question-created-message')}}
        </div>
    @elseif(session('question-updated-message'))
        <div class="success-msg">
            <i class="fa fa-check"></i>
            {{session('question-updated-message')}}
        </div>
    @endif


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
                    <form action="{{route('quizzes.destroy', $question->id)}}" method="post">
                        {{csrf_field()}}
                        @method('DELETE')
                        <input type="submit" value="Delete">
                    </form>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

    {{$questions->links()}}

@endsection
