<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Test;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function create(Test $test)
    {
        return view('admin.question.create', compact('test'));
    }
    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'test_id'=>'required',
            'title' => 'required',
            'var1' => 'required',
            'var2' => 'required',
            'var3' => 'required',
            'var4' => 'required',
            'answer'=>'required',
        ]);
        $testId = $request->input('test_id');

        $variants = [];

        $variants["1"] =  $request->input('var1');
        $variants["2"] =  $request->input('var2');
        $variants["3"] =  $request->input('var3');
        $variants["4"] =  $request->input('var4');

        Question::create([
            'test_id' => $request->input('test_id'),
            'title' => $request->input('title'),
            'variants'=> $variants,
            'answer'=> $request->input('answer'),
        ]);
        return redirect()->route('admin.test.show',$testId);
    }
    public function destroy(Question $question)
    {
        $question->delete();
        return redirect()->back();
    }
}
