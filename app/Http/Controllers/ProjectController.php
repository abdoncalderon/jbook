<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::get();
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(StoreProjectRequest $request )
    {
        Project::create($request ->validated());
        
        return redirect()->route('projects.index');
    }

    public function show(Project $project)
    {
        return view('projects.show',[
            'project'=>$project
            ]);
    }

    public function edit(Project $project)
    {
        return view('projects.edit',[
            'project'=>$project
            ]);
    }
    
    public function update(Project $project, UpdateProjectRequest $request)
    {
        $project->update($request->validated());

        return redirect()->route('projects.index');
    }
}
