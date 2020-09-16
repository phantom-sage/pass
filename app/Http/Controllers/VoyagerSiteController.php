<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use DB;
class VoyagerSiteController extends Controller
{
    public function projects()
    {
      $locale= app()->getLocale();
      $projects = DB::table('projects')
      ->select('name_'.$locale.' as name')
      ->get();
      return view('reports.projects',compact('projects'));
    }

    public function news()
    {
      $locale= app()->getLocale();
      $news = DB::table('news')
      ->select('name_'.$locale.' as name')
      ->get();
      return view('reports.news',compact('news'));
    }

    public function stories()
    {
      $locale= app()->getLocale();
      $stories = DB::table('stories')
      ->select('name_'.$locale.' as name')
      ->get();
      return view('reports.stories',compact('stories'));
    }
}
