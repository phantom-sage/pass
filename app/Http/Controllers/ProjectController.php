<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Seen;
use Illuminate\Http\Request;
use Auth;
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

      $seen = new Seen;
      $seen->counter+=1;
      $seen->user_id = (Auth::id()) ? Auth::id():0 ;
       $project->views()->save($seen);
        return view('project.show', [
            'project' => $project
        ]);
    }
}
