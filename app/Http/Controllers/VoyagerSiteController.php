<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\News;
use App\Models\Story;

class VoyagerSiteController extends Controller
{
    public function projects()
    {


      $projects = Project::all();
      return view('reports.projects',compact('projects'));
    }

    public function news()
    {

      $news = News::all();
      return view('reports.news',compact('news'));
    }

    public function stories()
    {

      $stories =Story::all();
      return view('reports.stories',compact('stories'));
    }
}
