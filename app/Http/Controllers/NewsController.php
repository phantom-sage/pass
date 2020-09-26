<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Seen;
use Illuminate\Http\Request;
use Auth;
use Session;
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
        $new = News::find($news->id);
      $viewed= "news".$news->id;
      if (!Session::has($viewed)) {
        $seen = new Seen;
        $seen->counter+=1;
        $seen->user_id = (Auth::id()) ? Auth::id():0 ;
         $news->views()->save($seen);

             Session::put($viewed, 1);
           }
        return view('new.show', [
            'new' => $new
        ]);
    }

}
