<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\PostView;
use Illuminate\Http\Request;
use Auth;
class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::all();
        return view('new.index', [
            'news' => $news,
        ]);
    }




    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show($locale,News $new)
    {
      $viewed = new PostView;
      $viewed->counter+=1;
      $viewed->user_id = (Auth::id()) ? Auth::id():0 ;
      $new->views()->save($viewed);
        return view('new.show', [
            'new' => $new
        ]);
    }

}
