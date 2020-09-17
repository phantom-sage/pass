<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\News;
use App\Models\Story;
use App\Models\Message;
use App\Http\Requests\StoreMessage;

class VoyagerSiteController extends Controller
{
    public function projects()
    {


      $projects = Project::all();
      return view('reports.projects',compact('projects'));
    }

    public function news()
    {

      $news = News::all();
      return view('reports.news',compact('news'));
    }

    public function stories()
    {

      $stories =Story::all();
      return view('reports.stories',compact('stories'));
    }

    public function createUserEmail()
    {
      return view("emails.user");
    }
    public function sendUserEmail(StoreMessage $request)
    {
      $validated = $request->only('message','email');
      Message::create($validated);
      return redirect()->back()->with('the message has been sent successfly!');
    }

    public function createUsersEmail()
    {
      return view("emails.users");
    }
    public function sendUsersEmail(StoreMessage $request)
    {
      $validated = $request->only('message','email');
      Message::create($validated);
      return redirect()->back()->with('the message has been sent successfly!');
    }
}
