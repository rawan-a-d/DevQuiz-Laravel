@extends('layouts.app_admin')

<link rel="stylesheet" type="text/css" href="{{ asset('/admin/css/add_edit.css') }}" />

@section('content')
    <!-- Enctype send multiple/different form data(image and text) -->
    <form action="/admin/quizzes/{{$question->id}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        @method('PUT')

        <!-- Question -->
        <div class="form-group">
            <label for="question">Question</label>
            <input class="form-control" type="text" name="question" value="{{$question->question}}">
            @error('question')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <!-- Subject -->
        <div class="form-group">
            <label for="subject">Subject</label>
            <select name="subject_id" id="subject">
                <option value="{{$question->subject->id}}">{{$question->subject->name}}</option>
                @if($question->subject->name == 'HTML')
                    <option value='2'>CSS</option>
                    <option value='3'>JS</option>

                @elseif($question->subject->name == 'CSS')
                    <option value='3'>JS</option>
                    <option value='1'>HTML</option>

                @else
                    <option value='2'>CSS</option>
                    <option value='1'>HTML</option>

                @endif

            </select>
        </div>
        <!-- Level -->
        <div class="form-group">
            <label for="level">Level</label>
            <input class="form-control" type="number" name="level" value="{{$question->level}}">
            @error('level')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <!-- Answer 1 -->
        <div class="form-group">
            <label for="ans_a">Answer 1</label>
            <input class="form-control" type="text" name="ans_a" value="{{$question->ans_a}}">
            @error('ans_a')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <!-- Answer 2 -->
        <div class="form-group">
            <label for="ans_b">Answer 2</label>
            <input class="form-control" type="text" name="ans_b" value="{{$question->ans_b}}">
            @error('ans_b')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <!-- Answer 3 -->
        <div class="form-group">
            <label for="ans_c">Answer 3</label>
            <input class="form-control" type="text" name="ans_c" value="{{$question->ans_c}}">
            @error('ans_c')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <!-- Answer 4 -->
        <div class="form-group">
            <label for="ans_d">Answer 4</label>
            <input class="form-control" type="text" name="ans_d" value="{{$question->ans_d}}">
            @error('ans_d')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <!-- Correct answer -->
        <div class="form-group">
            <label for="answer">Correct Answer</label>
            <select name="answer" id="answer">
                <option value="a">a</option>
                <option value="b">b</option>
                <option value="c">c</option>
                <option value="d">d</option>
            </select>
        </div>

        <div class="form-group">
            <input class="btn" type="submit" name="edit_question" value="Update Question">
        </div>
    </form>
@endsection
