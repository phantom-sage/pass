<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use DB;
class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { //// TODO: ,'video' don't forget to get the video after refreshing the database
      $locale= app()->getLocale();
      $projects = DB::table('projects')
      ->select('name_'.$locale.' as name', 'description_'.$locale.' as description','video','image')
      ->get();

        ddd($projects);
    }

  
}
