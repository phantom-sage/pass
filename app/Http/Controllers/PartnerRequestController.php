<?php

namespace App\Http\Controllers;

use App\Models\PartnerRequest;
use Illuminate\Http\Request;
use App\Http\Requests\StorePartnerRequest;
use App\Models\Partner;
class PartnerRequestController extends Controller
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
     public function create(Partner $partner)
     {
         return view("requests.partner",compact('partner'));
     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePartnerRequest $request,Partner $partner)
    {
        $validated = $request->validated();
        $validated['partner_id'] = $partner->id;
        
        PartnerRequest::create($validated);
       return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PartnerRequest  $partnerRequest
     * @return \Illuminate\Http\Response
     */
    public function show(PartnerRequest $partnerRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PartnerRequest  $partnerRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(PartnerRequest $partnerRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PartnerRequest  $partnerRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PartnerRequest $partnerRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PartnerRequest  $partnerRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(PartnerRequest $partnerRequest)
    {
        //
    }
}
