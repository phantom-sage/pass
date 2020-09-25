<?php

namespace App\Http\Controllers;

use App\Models\Story;
use App\Models\Seen;
use Illuminate\Http\Request;
use Auth;
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
      $seen = new Seen;
      $seen->counter+=1;
      $seen->user_id = (Auth::id()) ? Auth::id():0 ;
       $story->views()->save($seen);
        return view('story.show', [
            'story' => $story
        ]);
    }
}
