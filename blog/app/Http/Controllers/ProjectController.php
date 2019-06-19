<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    //

    public function index() {
        $projects = Project::all();
        return view('projects.index', ['projects' => $projects]);
    }

    public function show($id) {
        $project = Project::find($id);

        return view('projects.show', ['project' => $project]);

    }
}
