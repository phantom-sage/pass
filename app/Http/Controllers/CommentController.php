<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Project;
use App\Models\News;
use App\Models\Story;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCommentRequest;
use Auth;
class CommentController extends Controller
{



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request\StoreCommentRequest  $request
     *@param  App\Models\Project  $project
     */
    public function storeProject(StoreCommentRequest $request,Project $project)
    {//
             $comment = new Comment;
            $comment->user_id=Auth::id();
            $comment->body = $request->only('body');
            $project->comments()->save($comment);
            ddd($project,$comment);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request\StoreCommentRequest  $request
     *@param  App\Models\News  $news
     */
    public function storeNews(StoreCommentRequest $request,News $news)
    {
            $comment = new Comment;
            $comment->user_id=Auth::id();
            $comment->body = $request->only('body');
            $news->comments()->save($comment);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request\StoreCommentRequest  $request
     *@param  App\Models\Story  $story
     */
    public function storeStory(StoreCommentRequest $request,Story $story)
    {
            $comment = new Comment;
            $comment->user_id=Auth::id();
            $comment->body = $request->only('body');
            $story->comments()->save($comment);
    }


}