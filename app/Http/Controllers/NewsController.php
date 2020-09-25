<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

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
    public function show($locale,News $news)
    {
      $viewed = new PostView;
      $viewed->counter+=1;
      $project->views->save($viewed);
        return view('new.show', [
            'new' => $new
        ]);
    }

}
