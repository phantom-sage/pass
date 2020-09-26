<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //// TODO: ,'video' don't forget to get the video after refreshing the database
        $locale= app()->getLocale();
        $projects = Project::all();

        return view('project.index', [
            'projects' => $projects,
        ]);
    }

    public function show($locale ,Project $project)
    {
        $project = Project::find($project->id);
        return view('project.show', [
            'project' => $project
        ]);
    }
}
