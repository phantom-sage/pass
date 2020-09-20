<?php

namespace App\Http\Controllers;

use App\Models\Share;
use Illuminate\Http\Request;

class ShareController extends Controller
{
  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  App\Models\Story  $stroy
   */
  public function storeStory(Request $request,Stroy $story)
  {
    $share = new Share;
    if(Auth::user()){
      $share->user_id = Auth::id();
    }
      $share->counter+=1;
      $story->shares()->save($share);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  App\Models\News  $news
   */
  public function storeNews(Request $request,News $news)
  {
    $share = new Share;
    if(Auth::user()){
      $share->user_id = Auth::id();
    }
      $share->counter+=1;
      $news->shares()->save($share);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  App\Models\Project  $project
   */
  public function storeProject(Request $request,Project $project)
  {
    $share = new Share;
    if(Auth::user()){
      $share->user_id = Auth::id();
    }
      $share->counter+=1;
      $project->shares()->save($share);
  }
}
