<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Project;

class ProjectsController extends Controller
{
    public function index(){
    	$projects = Project::all();
    	return view("modules.projects.index")->with("projects", $projects);
    }

    public function store(Request $request){
    	Project::create([
            "project_title" => $request->project_title,
            "website" => $request->website,
            "email" => $request->email,
            "telegram" => $request->telegram,
            "note" => $request->note
        ]);

        return redirect()->route('projects.index')->with('success', 'Project created successfully.');
    }

    public function create(){
    	return view("modules.projects.create");
    }

    public function show($project_id){
    	$project = Project::find($project_id);
        return view('modules.projects.show')->with("project", $project);
    }

    public function edit($project_id){
        $project = Project::find($project_id);
        return view('modules.projects.edit')->with("project", $project);
    }

    public function update(Request $request, $project_id){
    	$projects = Project::find($project_id);
        $projects->project_title = $request->project_title;
        $projects->website = $request->website;
        $projects->email = $request->email;
        $projects->telegram = $request->telegram;
        $projects->note = $request->note;
        $projects->save();

        return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
    }

    public function destroy($project_id){
    	$projects = Project::find($project_id);
        $projects->delete();
        return redirect()->route('projects.index')->with('success', 'Project deleted succesfuly.');
    }

}
