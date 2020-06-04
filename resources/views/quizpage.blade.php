@extends('layouts.master')
@section('sessions')
    @parent
    <?php

$ok=1;$havequestions=1;
if (isset($_GET['subject'])) $subject=$_GET['subject'];
else $ok=0;
if (isset($_GET['level'])) $level=$_GET['level'];
else $ok=0;
if ($ok){
$controller = new quizzController();
$questions=$controller->getQuestionsBySubjectLevel($subject, $level);
$nrq=$controller->getCountBySubjectLevel($subject, $level);
if (!$nrq) $havequestions=0;

if (!isset($_SESSION['currentq']))
{
    $_SESSION['currentq']=0;
    $_SESSION['correctans']=0;
}
else $_SESSION['currentq']=$_SESSION['currentq']+1;
//echo $_SESSION['currentq'];
if (isset($_GET['c']))
{
    if ($_GET['c']) $_SESSION['correctans']++;
}
    ?>
@endsection


@section('title', 'Dev Quiz')
@section('css', 'quizpage')

@section('content')
    <header  id="website_purpose">
        <h1 class="testname">
          {{$question->subject}}
        </h1>
    </header>

    <div class="page-wrap">

        <h1>&nbsp;</h1>

        <ol style="list-style-type:none;">

            <li>

                <h3><?php echo $_SESSION['currentq']+1;echo ".  ";echo htmlspecialchars($q['question']);echo " ?";?></h3>

                <h2>
                    <input type="radio" name="question-1-answers" id="question-1-answers-A" value="a" />
                    <label for="question-1-answers-A"><?php echo htmlspecialchars($q['ans_a']);?> </label>
                </h2>

                <h4>
                    <input type="radio" name="question-1-answers" id="question-1-answers-B" value="b" />
                    <label for="question-1-answers-B"><?php echo htmlspecialchars($q['ans_b']);?></label>
                </h4>

                <h5>
                    <input type="radio" name="question-1-answers" id="question-1-answers-C" value="c" />
                    <label for="question-1-answers-C"><?php echo htmlspecialchars( $q['ans_c']);?></label>
                </h5>

                <h6>
                    <input type="radio" name="question-1-answers" id="question-1-answers-D" value="d" />
                    <label for="question-1-answers-D"><?php echo htmlspecialchars( $q['ans_d']);?></label>
                </h6>

            </li>

        </ol>

        <input class="submitbutton" type="submit" value="Submit Question" onclick="verify();"/>

    <?php
        }
        else {
          if ($havequestions)
          {
            ?>
    <!--html code here-->
        <div id="content">
            <div class="page-wrap">
                <h3>You answered correctly:</h3>
                <h3><?php echo $_SESSION['correctans'];?>  / {{$nrq}}?></h3>
            </div>
        </div>
    <?php
    $_SESSION['currentq']=-1;
    $_SESSION['correctans']=0;
    //unset($nrq);
    //unset($ok);
    //unset($q);
    //unset($questions);
    //unset($_SESSION['currentq']);
    //unset($_SESSION['correctans']);
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
        }?>

    </div>
@endsection
