@extends('layouts.master')
<link rel="stylesheet" href="{{ asset('/css/quizpage.css') }}">
@section('sessions')
@parent
@endsection

@section('title', 'Dev Quiz')
@section('content')

<?php
if (isset($question))
{

?>
<script>
    function verify(){
        var totalCorrect = {{$correct ?? 0}};
        var x = document.getElementsByName ("question-1-answers");
        for (var i=0;i<x.length;i++) {
            if (x[i].checked) {
                if (x[i].value == '{{$question->answer}}') {
                    totalCorrect++;
                }
            }
        }
        // Redirect
        window.location.href = "/quizpage/{{$question->subject->id}}/{{$question->level}}/{{$question->id}}/" + totalCorrect;
    }
</script>
    <header  id="website_purpose">
        <h1 class="testname">
     {{$question->subject->name}}
        </h1>
    </header>

    <div class="page-wrap">

        <h1>&nbsp;</h1>

        <ol style="list-style-type:none;">

            <li>

                <h3>{{$question->question}}</h3>

                <h2>
                    <input type="radio" name="question-1-answers" id="question-1-answers-A" value="a" />
                    <label for="question-1-answers-A">{{$question->ans_a}}</label>
                </h2>

                <h4>
                    <input type="radio" name="question-1-answers" id="question-1-answers-B" value="b" />
                    <label for="question-1-answers-B">{{$question->ans_b}}</label>
                </h4>

                <h5>
                    <input type="radio" name="question-1-answers" id="question-1-answers-C" value="c" />
                    <label for="question-1-answers-C">{{$question->ans_c}}</label>
                </h5>

                <h6>
                    <input type="radio" name="question-1-answers" id="question-1-answers-D" value="d" />
                    <label for="question-1-answers-D">{{$question->ans_d}}</label>
                </h6>

            </li>

        </ol>

        <input class="submitbutton" type="submit" value="Submit Question" onclick="verify();"/>

    <?php
        }
        else {
            if(!$hasNext){
            ?>
    <!--html code here-->
        <div id="content">
            <div class="page-wrap">
                <h3>You answered correctly:</h3>
                <h3>{{$correct}} / {{$total}}</h3>
            </div>
        </div>
    <?php

    }
    else
    {
    ?>
    <!--html code here-->
        <div id="content">
            <div class="page-wrap">
                <h3>This section</h3>
                <h3>Has no questions yet!</h3>
            </div>
        </div>
        <?php
        }
    }
        ?>

    </div>
@endsection
