<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\RequestVoluter;
use App\Models\VolunteerRequest;
use Illuminate\Http\Request;
use App\Http\Requests\StoreVolunteerRequest;
use App\Models\Volunteer;
use App\Models\User;
class VolunteerRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Volunteer $volunteer)
    {
        ddd('do it yourself');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVolunteerRequest $request, $locale, Volunteer $volunteer)
    {
        $validated = $request->validated();
        $validated['volunteer_id'] = $volunteer->id;
        $volunteer=VolunteerRequest::create($validated);
        $user = User::where('role_id','=',1)->first();
        Mail::to($user->email)->send(new RequestVoluter($volunteer));
        $message = '';
        if ($locale === 'en')
        {
            $message = 'Volunteer request send successfully.';
        }
        else if ($locale === 'ar')
        {
            $message = 'تم ارسال طلب التطوع بنجاح';
        }
        else
        {
            $message = 'Volunteer request send successfully.';
        }

        $request->session()->flash('volunteer_request_message', $message);
        return redirect()->route('volunteers', $locale);

    }


}
