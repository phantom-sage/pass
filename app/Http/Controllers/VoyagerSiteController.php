<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\News;
use App\Models\Story;
use App\Models\User;
use App\Models\Message;
use App\Models\PartnerRequest;
use App\Models\VolunteerRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMessage;
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

    public function partnersRequests()
    {
      $partnersRequests =
      PartnerRequest::select('id','organization',
                             'organization_area')
                             ->where('replay','=',null)
                             ->orderBy('replay')->get();

      return view('requests.partner-request',compact('partnersRequests'));
    }
    public function partnerRequestView(PartnerRequest $partnerRequest)
    {

      return view('requests.partner-view',compact('partnerRequest'));
    }

    public function volunteersRequests()
    {
      $volunteersRequests =

      VolunteerRequest::select('id','full_name',
                             'work_place','replay')
                             ->where('replay','=',null)
                             ->orderBy('replay')->get();
                             ddd($volunteersRequests);
      return view('requests.volunteer-request',compact('volunteersRequests'));
    }

    public function volunteerRequestView(VolunteerRequest $volunteerRequest)
    {

      return view('requests.volunteer-view',compact('volunteerRequest'));
    }

    public function createUserEmail()
    {
      return view("emails.user");
    }

    public function sendUserEmail(StoreMessage $request)
    {
      $validated = $request->only('message','email');
      $message=Message::create($validated);

      //ddd($message->message);

        Mail::to($message->email)->send(new SendMessage($message));

      return back()->with('message','the message has been sent successfly!');
    }
    /***
    * form for sending email for all users
    *
    ***********/
    public function createUsersEmail()
    {
      return view("emails.users");
    }
    /**
    *@param App\Http\Requests\StoreMessage $request
    *
    *
    ***********/
    public function sendUsersEmail(StoreMessage $request)
    {
      $users = User::all();
      $validated = $request->only('message');
      $message=Message::create($validated);
      if($message){
        foreach ($users as $user ) {
          if($user->email!=null){
          Mail::to($user->email)->send(new SendMessage($message));
            }
          }
      }
      return back()->with('message','the message has been sent successfly!');
    }
}
