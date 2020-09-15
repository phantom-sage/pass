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
        return view("requests.volunteer",compact('volunteer'));
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

      return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VolunteerRequest  $volunteerRequest
     * @return \Illuminate\Http\Response
     */
    public function show(VolunteerRequest $volunteerRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VolunteerRequest  $volunteerRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(VolunteerRequest $volunteerRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VolunteerRequest  $volunteerRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VolunteerRequest $volunteerRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VolunteerRequest  $volunteerRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(VolunteerRequest $volunteerRequest)
    {
        //
    }
}
