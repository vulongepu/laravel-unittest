<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects =  \App\Models\Project::all();

        return view('projects.index', compact('projects'));
    }

    public function store()
    {
        $attributes = request()->validate([
            'title' => 'required',
            'description' => 'required',
//            'owner_id' => 'required'
        ]);

        $attributes['owner_id'] = auth()->id();


        Project::create($attributes);

        return redirect('/projects');
    }

    public function show()
    {
        $project = Project::findOrFail(request('project'));

        return view('projects.show', compact('project'));
    }
}
