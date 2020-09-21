<?php

namespace App\Http\Controllers;

use App\Models\PartnerRequest;
use Illuminate\Http\Request;
use App\Http\Requests\StorePartnerRequest;
use App\Mail\PartnerReply;
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

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create(Partner $partner)
     {
         ddd('as you said you don\'t need view xd');
     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePartnerRequest $request)
    {
        $validated = $request->validated();
        PartnerRequest::create($validated);
        ddd("done");
    }


}
