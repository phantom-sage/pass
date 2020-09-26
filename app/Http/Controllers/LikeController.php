<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Project;
use App\Models\News;
use App\Models\Story;
use Illuminate\Http\Request;
use Auth;
class LikeController extends Controller
{



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Models\Story  $stroy
     */
    public function storeStory(Request $request,Story $story)
    {
      $like = new Like();
      if(Auth::user()){
        $like->user_id = Auth::id();
      }
        $like->counter+=1;
        $story->likes()->save($like);

        return redirect()->route('story.show', [
            'locale' => app()->getLocale(),
            'story' => $story
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Models\News  $news
     */
    public function storeNews(Request $request,News $news)
    {

      $like = new Like();
      if(Auth::user()){
        $like->user_id = Auth::id();
      }
        $like->counter+=1;
        $news->likes()->save($like);

        return redirect()->route('news.show', [
            'locale' => app()->getLocale(),
            'news' => $news
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Models\Project  $project
     */
    public function storeProject(Request $request,Project $project)
    {
      $like = new Like();
      if(Auth::user()){
        $like->user_id = Auth::id();
      }
        $like->counter+=1;
        $project->likes()->save($like);

        return redirect()->route('project.show', [
            'locale' => app()->getLocale(),
            'project' => $project->id
        ]);
    }

}
