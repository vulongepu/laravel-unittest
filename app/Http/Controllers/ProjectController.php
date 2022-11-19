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
        \App\Models\Project::create((request(['title', 'description'])));

        return redirect('/projects');
    }

    public function show()
    {
        $project = Project::findOrFail(request('project'));

        return view('projects.show', compact('project'));
    }
}
