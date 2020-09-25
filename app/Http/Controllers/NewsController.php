<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Seen;
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
    public function show($locale,News $news)
    {
      $seen = new Seen;
      $seen->counter+=1;
      $seen->user_id = (Auth::id()) ? Auth::id():0 ;
       $news->views()->save($seen);

        return view('new.show', [
            'new' => $news
        ]);
    }

}
