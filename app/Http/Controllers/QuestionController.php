<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;

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
        $questions = Question::paginate(10);
//
//        $questions = Question::paginate(10)->sortBy(function($item){
//            return $item->subject_id.'#'.$item->level;
//        });

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
        //VALIDATE DATA
        $inputs = request()->validate([
            'question'=>'required|min:8|max:255',
            'level'=>'required',
            'ans_a'=>'required',
            'ans_b'=>'required',
            'ans_c'=>'required',
            'ans_d'=>'required',
        ]);

        $inputs['subject_id'] = $request->subject_id;
        $inputs['answer'] = $request->subject_id;

        session()->flash('question-created-message', 'Question with title "'.$inputs['question'].'" was added');

        $question = new Question($inputs);

        $question->save();

        return redirect('admin/quizzes');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

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
        //VALIDATE DATA
        $inputs = request()->validate([
            'question'=>'required|min:8|max:255',
            'level'=>'required',
            'ans_a'=>'required',
            'ans_b'=>'required',
            'ans_c'=>'required',
            'ans_d'=>'required',
        ]);

        $question = Question::findOrFail($id);

        $question->update($inputs);

        session()->flash('question-updated-message', 'Question with title "'.$question->question.'" was updated');

        return redirect('admin/quizzes');
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

        session()->flash('message', 'Question was deleted');

        return back();
    }
}
