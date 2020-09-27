<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Vistor;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
     public function handle($request, Closure $next)
     {

       $vistor = new Vistor();
       @// TODO: if(user_id == auth()->check())?auth()->id()  )
       $session= request()->getSession()->getId();
       $visted=Vistor::where('session_id', $session)->first();
       if(!$visted){
         $vistor->session_id =$session;
         $vistor->user_id =(auth()->check())?auth()->id():null;
         $vistor->ip_address =request()->ip();
         $vistor->user_agent =request()->header('User-Agent');
         $vistor->date= date('Y-m-d');
         $vistor->vists+= 1;
         $vistor->save();

       }
         app()->setLocale($request->segment(1));
         return $next($request);
     }
}
