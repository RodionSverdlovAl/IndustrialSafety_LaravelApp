<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Models\Test;
use Illuminate\Http\Request;

class AssesmentController extends Controller
{
    public function create(Test $test)
    {
        return view('user.assesments.create', compact('test'));
    }
    public function store(Request $request)
    {
        Assessment::create([
            'test_id' => $request->input('test_id'),
            'user_id' => $request->input('user_id'),
            'mark' => $request->input('test_result'),
        ]);
        return redirect()->route('user.profile');
    }
    public function index(){
        $assessments = Assessment::all();
        return view('admin.assessment.index', compact('assessments'));
    }
}
