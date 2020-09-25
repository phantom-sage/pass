<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\Request;

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
        $stories =Story::all();
        return view('story.index', [
            'stories' => $stories,
        ]);
    }

    public function show($locale,Story $story)
    {
      $viewed = new PostView;
      $viewed->counter+=1;
      $project->views->save($viewed);
        return view('story.show', [
            'story' => $story
        ]);
    }
}
