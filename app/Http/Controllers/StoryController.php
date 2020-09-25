<?php

namespace App\Http\Controllers;

use App\Models\Story;
use App\Models\Seen;
use Illuminate\Http\Request;
use Auth;
use Session;
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
      $viewed= "story".$story->id;
      if (!Session::has($viewed)) {
        $seen = new Seen;
        $seen->counter+=1;
        $seen->user_id = (Auth::id()) ? Auth::id():0 ;
         $story->views()->save($seen);

             Session::put($viewed, 1);
           }

        return view('story.show', [
            'story' => $story
        ]);
    }
}
