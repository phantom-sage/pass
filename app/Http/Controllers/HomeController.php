<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $locale = app()->getLocale();

      $projects = DB::table('projects')
          ->select('id', 'name_'.$locale.' as name', 'description_'.$locale.' as description','video','image')
          ->limit(3)
          ->get();

      $first_hot_news = DB::table('news')
          ->select('id', 'name_'.$locale.' as name', 'description_'.$locale.' as description','video','image')
          ->where('id', '=', 14)
          ->limit(1)
          ->first();

      $second_hot_news = DB::table('news')
          ->select('id', 'name_'.$locale.' as name', 'description_'.$locale.' as description','video','image')
          ->where('id', '=', 14)
          ->limit(1)
          ->first();

      $hot_story = DB::table('stories')
          ->select('id', 'name_'.$locale.' as name', 'description_'.$locale.' as description','video','image')
          ->where('id', '=', 13)
          ->limit(1)
          ->first();

      $hot_project = DB::table('projects')
          ->select('id', 'name_'.$locale.' as name', 'description_'.$locale.' as description','video','image')
          ->where('id', '=', 14)
          ->limit(1)
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
