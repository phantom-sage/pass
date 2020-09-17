<?php

namespace App\Http\Controllers;

use App\Models\Volunteer;
use Illuminate\Http\Request;
use DB;
use App\Models\Project;
class VolunteerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locale= app()->getLocale();
        $volunteers = DB::table('volunteers')->select('id','name_'.$locale.' as name', 'description_'.$locale.' as description','qualification_'.$locale.' as qualification','start_at','end_at')->get();
        $projects = DB::table('projects')->select('name_'.$locale.' as name', 'description_'.$locale.' as description','video','image')->get();

        return view('volunteer.index', [
            'volunteers' => $volunteers,
            'projects' => $projects,
        ]);
    }

  
}
