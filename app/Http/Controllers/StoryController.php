<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\Request;
use DB;
class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $locale= app()->getLocale();
        $stories = DB::table('stories')
            ->select('name_'.$locale.' as name', 'story_'.$locale.' as story','description_'.$locale.' as description','video','image')
            ->get();

        return view('story.index', [
            'stories' => $stories,
        ]);
    }

    public function show($locale,Story $story)
    {
      $story = DB::table('stories')
          ->select('name_'.$locale.' as name', 'story_'.$locale.' as story','description_'.$locale.' as description','video','image')
          ->where('id','=',$story->id)
          ->get();
          ddd($story);
    }
}
