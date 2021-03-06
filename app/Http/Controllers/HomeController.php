<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vistor;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

      $locale = app()->getLocale();

      $projects = DB::table('projects')
          ->select('id', 'name_'.$locale.' as name', 'description_'.$locale.' as description','video','image')
          ->latest('created_at')
          ->limit(3)
          ->get();

      $first_hot_news = DB::table('news')
          ->select('id', 'name_'.$locale.' as name', 'description_'.$locale.' as description','video','image')
          ->latest('created_at')
          ->first();

      $second_hot_news = DB::table('news')
          ->select('id', 'name_'.$locale.' as name', 'description_'.$locale.' as description','video','image')
          ->latest('created_at')
          ->first();

      $hot_story = DB::table('stories')
          ->select('id', 'story_'.$locale.' as name', 'description_'.$locale.' as description','video','image')
          ->latest('created_at')
          ->first();

      $hot_project = DB::table('projects')
          ->select('id', 'name_'.$locale.' as name', 'description_'.$locale.' as description','video','image')
          ->latest('created_at')
          ->first();

      return view('welcome', [
          'projects' => $projects,
          'first_hot_news' => $first_hot_news,
          'second_hot_news' => $second_hot_news,
          'hot_story' => $hot_story,
          'hot_project' => $hot_project
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
