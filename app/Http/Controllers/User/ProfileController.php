<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Assessment;
use App\Models\Document;
use App\Models\Incident;
use App\Models\Test;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile()
    {
        $tests = Test::all();
        $myTests = [];
        foreach ($tests as $test)
        {
            foreach ($test->user_ids as $id)
            {
                if($id == auth()->user()->id){
                    $myTests[] = $test;
                }
            }
        }
        $assessments = Assessment::where('user_id', auth()->user()->id)->get();

        $myIncidents = [];
        $incidents = Incident::all();
        foreach ($incidents as $incident)
        {
            foreach ($incident->user_ids as $id){
                if($id == auth()->user()->id){
                    $myIncidents[] = $incident;
                }
            }
        }
        return view('user.profile', compact('myTests', 'assessments', 'myIncidents'));
    }

    public function documentIndex()
    {
        $documents = Document::all();
        return view('user.document.index', compact('documents'));
    }
}
