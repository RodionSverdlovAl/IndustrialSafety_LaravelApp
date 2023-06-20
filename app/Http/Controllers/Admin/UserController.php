<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Assessment;
use App\Models\Incident;
use App\Models\Test;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showRegistrationForm()
    {
        return view('admin.user.register');
    }
    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'surname' => 'required',
            'department' => 'required',
            'position' => 'required',
        ]);
        $id = $request->input('id');
        $name = $request->input('name');
        $surname = $request->input('surname');
        $department = $request->input('department');
        $position = $request->input('position');
//        dd(User::where('id', $id)->get());
        User::where('id',$id)->update([
            'name' => $name,
            'surname' => $surname,
            'department' => $department,
            'position' => $position,
        ]);
        return redirect()->route('admin.user.index');
    }
    public function index()
    {
        $users = User::where('role', 'user')->get();
        return view('admin.user.index',compact('users'));
    }
    public function show(User $user)
    {

        $tests = Test::all();
        $myTests = [];
        foreach ($tests as $test)
        {
            foreach ($test->user_ids as $id)
            {
                if($id == $user->id){
                    $myTests[] = $test;
                }
            }
        }
        $assessments = Assessment::where('user_id', $user->id)->get();

        $myIncidents = [];
        $incidents = Incident::all();
        foreach ($incidents as $incident)
        {
            foreach ($incident->user_ids as $id){
                if($id == $user->id){
                    $myIncidents[] = $incident;
                }
            }
        }

        return view('admin.user.show', compact('user', 'assessments', 'myIncidents', 'myTests'));
    }
}
