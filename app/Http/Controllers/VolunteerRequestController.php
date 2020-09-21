<?php

namespace App\Http\Controllers;

use App\Models\VolunteerRequest;
use Illuminate\Http\Request;
use App\Http\Requests\StoreVolunteerRequest;
use App\Models\Volunteer;
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
    public function store(StoreVolunteerRequest $request,Volunteer $volunteer)
    {
        $validated = $request->validated();
        $validated['volunteer_id'] = $volunteer->id;

       VolunteerRequest::create($validated);

  

    }


}
