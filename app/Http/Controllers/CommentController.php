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
    public function storeProject(StoreCommentRequest $request,$locale,Project $project)
    {//

             $comment = new Comment;
            $comment->user_id=Auth::id();
            $comment->body = $request->input('body');

            $project->comments()->save($comment);
            return redirect()->route('project.show', [
                'locale' => $locale,
                'project' => $project->id
            ])->with('commentSaveStatus', 'comment saved successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request\StoreCommentRequest  $request
     *@param  App\Models\Project  $project
     */
    public function storeProjectReply(StoreCommentRequest $request,$locale,Project $project,Comment $comment)
    {//
         $new_comment = new Comment;
        $new_comment->user_id=Auth::id();
        $new_comment->body =  $request->input('body');
        $new_comment->parent_id = $comment->id;
        $project->comments()->save($new_comment);

        return redirect()->route('project.show', [
            'locale' => $locale,
            'project' => $project->id
        ])->with('commentReplaySaveStatus', 'comment replay saved successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request\StoreCommentRequest  $request
     *@param  App\Models\News  $news
     *@param  App\Models\Comment  $comment
     */
     public function storeNews(StoreCommentRequest $request,$locale,News $news)
    {
            $comment = new Comment;
            $comment->user_id=Auth::id();
            $comment->body =  $request->input('body');

            $news->comments()->save($comment);

        return redirect()->route('news.show', [
            'locale' => $locale,
            'news' => $news
        ])->with('commentSaveStatus', 'comment saved successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request\StoreCommentRequest  $request
     *@param  App\Models\News  $news
     *@param  App\Models\Comment  $comment
     */
    public function storeNewsReply(StoreCommentRequest $request,$locale,News $news,Comment $comment)
    {
        $new_comment = new Comment;
        $new_comment->user_id=Auth::id();
        $new_comment->body =  $request->input('body');
        $new_comment->parent_id = $comment->id;
        $news->comments()->save($new_comment);

        return redirect()->route('news.show', [
            'locale' => $locale,
            'news' => $news
        ])->with('commentReplaySaveStatus', 'comment replay saved successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request\StoreCommentRequest  $request
     *@param  App\Models\Story  $story
     */
    public function storeStory(StoreCommentRequest $request,$locale,Story $story)
    {
        $comment = new Comment;
        $comment->user_id=Auth::id();
        $comment->body =  $request->input('body');

        $story->comments()->save($comment);

        return redirect()->route('story.show', [
            'locale' => $locale,
            'story' => $story
        ])->with('commentSaveStatus', 'comment saved successfully.');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request\StoreCommentRequest  $request
     *@param  App\Models\Story  $story
     *@param  App\Models\Comment  $comment
     */
    public function storeStoryReply(StoreCommentRequest $request,$locale,Story $story,Comment $comment)
    {
        $new_comment = new Comment;
        $new_comment->user_id=Auth::id();
        $new_comment->body =  $request->input('body');
        $new_comment->parent_id = $comment->id;
        $story->comments()->save($new_comment);

        return redirect()->route('story.show', [
            'locale' => $locale,
            'story' => $story
        ])->with('commentReplaySaveStatus', 'comment replay saved successfully.');
    }


}
