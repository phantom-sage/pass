<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Models\PartnerRequest;
use Illuminate\Http\Request;
use App\Http\Requests\StorePartnerRequest;
use App\Mail\PartnerReply;
use App\Models\Partner;
use App\Mail\Requestpartner;
use App\Models\User;
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

        $partner =  PartnerRequest::create($validated);
        $user = User::where('role_id','=',1)->first();
        Mail::to($user->email)->send(new Requestpartner($partner));
        // This is lines added by 'phantom-sage'
        $message = '';
        $locale = app()->getLocale();
        if ($locale === 'ar')
        {
            $message = "تم ارسال طلب الشريك بنجاح";
        }
        else
        {
            $message = "your request of joining up pass partners was send successfully";
        }
        $request->session()->flash('partner_request', $message);
        return redirect()->route('partners', ['locale' => app()->getLocale()]);
    }


}
