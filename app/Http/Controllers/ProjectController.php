<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Seen;
use Illuminate\Http\Request;
use Auth;
use Session;
class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $locale= app()->getLocale();
        $projects = Project::all();

        return view('project.index', [
            'projects' => $projects,
        ]);
    }

    public function show($locale ,Project $project)
    {
            //dd(Auth::check()?Auth::id():null);
        $project = Project::find($project->id);
      $viewed= "project".$project->id;
      if (!Session::has($viewed)) {
        $seen = new Seen;
        $seen->counter+=1;
        $seen->user_id = (Auth::id()) ? Auth::id():null ;
         $project->views()->save($seen);

             Session::put($viewed, 1);
           }

        return view('project.show', [
            'project' => $project
        ]);
    }
}
