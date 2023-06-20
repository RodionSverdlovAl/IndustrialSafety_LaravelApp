<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Incident;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\In;

class IncidientController extends Controller
{
    public function index()
    {
        $incidents = Incident::all();
        return view('admin.incident.index', compact('incidents'));
    }
    public function create()
    {
        $users = User::where('role', 'user')->get();
        return view('admin.incident.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'user_ids' => 'required|array',
            'status'=> 'required',
        ]);
        Incident::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'user_ids' => $request->input('user_ids'),
            'owner'=> auth()->user()->id,
            'status'=>$request->input('status'),
        ]);

        return redirect()->route('admin.incident.index');
    }
    public function edit(Incident $incident)
    {
        return view('admin.incident.edit', compact('incident'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'id'=>'required',
            'name' => 'required',
            'description' => 'required',
            'status'=> 'required',
        ]);

        $id =  $request->input('id');
        $name =  $request->input('name');
        $description =  $request->input('description');
        $status = $request->input('status');

        Incident::where('id', $id)->update([
            'name'=>$name,
            'description'=>$description,
            'status'=>$status
        ]);
        return redirect()->route('admin.incident.index');
    }

    public function destroy(Incident $incident)
    {
        $incident->delete();
        return redirect()->route('admin.incident.index');
    }

}
