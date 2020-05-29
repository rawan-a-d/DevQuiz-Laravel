@extends('layouts.app_admin')

<link rel="stylesheet" type="text/css" href="{{ asset('/admin/css/edit_user.css') }}" />

@section('content')
    <!-- Enctype send multiple/different form data(image and text) -->
    <form action="/admin/quizzes" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}

    <!-- Question -->
        <div class="form-group">
            <label for="question">Question</label>
            <input class="form-control" type="text" name="question">
        </div>

        <!-- Subject -->
        <div class="form-group">
            <label for="subject">Subject</label>
            <select name="subject_id" id="subject">
                <option value='1'>HTML</option>;
                <option value='2'>CSS</option>;
                <option value='3'>JS</option>;
            </select>
        </div>
        <!-- Level -->
        <div class="form-group">
            <label for="level">Level</label>
            <input class="form-control" type="number" name="level">
        </div>
        <!-- Answer 1 -->
        <div class="form-group">
            <label for="ans_a">Answer 1</label>
            <input class="form-control" type="text" name="ans_a">
        </div>
        <!-- Answer 2 -->
        <div class="form-group">
            <label for="ans_b">Answer 2</label>
            <input class="form-control" type="text" name="ans_b">
        </div>
        <!-- Answer 2 -->
        <div class="form-group">
            <label for="ans_c">Answer 3</label>
            <input class="form-control" type="text" name="ans_c">
        </div>
        <!-- Answer 4 -->
        <div class="form-group">
            <label for="ans_d">Answer 4</label>
            <input class="form-control" type="text" name="ans_d">
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
            <input class="btn" type="submit" name="add_question" value="Add Question">
        </div>
    </form>
@stop

@section('js')
    {{--    <script type="text/javascript" src="/admin/js/users.js"></script>--}}

@stop
