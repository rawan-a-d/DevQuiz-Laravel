<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get questions and sort them by subject then by level
        $questions = Question::all()->sortBy(function($item){
            return $item->subject_id.'#'.$item->level;
        });

        return view("admin.quizzes.quizzes", compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.quizzes.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $question = new Question($request->all());

        //return $user;
        $question->save();

        //return $question;

        return redirect('admin/quizzes');

    }

    public function first($subject, $level)
    {
        $question = Question::with('Subject')
            ->where([
                ['subject_id', '=', $subject],
                ['level', '=', $level]])
            ->orderBy('id')
            ->limit(1)
            ->get()->first();

        return view('quizpage', ['question' => $question, 'hasNext' => $this->hasNext($subject, $level, $question->id)]);

    }
    public function next($subject, $level, $id, $correct)
    {
        $question = $this->getNextQuestion($subject, $level, $id);
        $questions = Question::with('Subject')
            ->where([
                ['subject_id', '=', $subject],
                ['level', '=', $level]])
            ->get();
        $total = count($questions);

        return view('quizpage', [
            'question' => $question,
            'hasNext' => $this->hasNext($subject, $level, $id),
            'total' => $total,
            'correct' => $correct
        ]);
    }

    public function hasNext($subject, $level, $id)
    {
        if($this->getNextQuestion($subject, $level, $id))
        {
            return true;
        }
        return false;

    }

    private function getNextQuestion($subject, $level, $id)
    {
        return Question::with('Subject')
            ->where([
                ['subject_id', '=', $subject],
                ['level', '=', $level],
                ['id', '>', $id]
            ])
            ->orderBy('id')
            ->limit(1)
            ->get()->first();
    }

    public function show($id)
    {
        $question = Question::findOrFail($id);
        return view('quizpage', ['question' => $question]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::findOrFail($id);

        return view('admin.quizzes.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $question = Question::findOrFail($id);

        $question->update($request->all());

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $question = Question::findOrFail($id);

        $question->delete();

        return back();
    }
}
