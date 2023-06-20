<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Test;
use App\Models\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function create()
    {
        $users = User::where('role', 'user')->get();
        return view('admin.test.create', compact('users'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'user_ids' => 'required|array',
            'period' => 'required'
        ]);

        Test::create([
            'title' => $request->input('title'),
            'user_ids' => $request->input('user_ids'),
            'owner_id'=> auth()->user()->id,
            'period' => $request->input('period')
        ]);
        return redirect()->route('admin.test.index');
    }
    public function edit(Test $test)
    {
        return view('admin.test.edit', compact('test'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'id'=>'required',
            'title' => 'required',
            'period' => 'required'
        ]);
        $id = $request->input('id');
        $title = $request->input('title');
        $period = $request->input('period');

        Test::where('id',$id)->update([
            'title'=>$title,
            'period'=>$period,
        ]);
        return redirect()->route('admin.test.index');
    }
    public function index()
    {
        $tests = Test::all();
        $users = User::where('role','user')->get();
        //dd($tests[0]->user_ids);
        return view('admin.test.index', compact('tests', 'users'));
    }

    public function show(Test $test)
    {
        $users = User::where('role', 'user')->get();
        return view('admin.test.show', compact('test', 'users'));
    }

    public function destroy(Test $test)
    {
        $test->questions()->forceDelete();
        $test->assessments()->forceDelete();
        $test->delete();
        return redirect()->route('admin.test.index');
    }
}
