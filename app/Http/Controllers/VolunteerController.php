<?php

namespace App\Http\Controllers;

use App\Models\Volunteer;
use DB;
use Illuminate\View\View;

class VolunteerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return Volunteer::all();
        $locale= app()->getLocale();
        $volunteers = DB::table('volunteers')->select('id','name_'.$locale.' as name', 'description_'.$locale.' as description','qualification_'.$locale.' as qualification','start_at','end_at')
                        ->get();

        return view('volunteer.index', [
            'volunteers' => $volunteers
        ]);
    }

    /**
     * Getting specific resource
     * @param string $locale
     * @param Volunteer $volunteer
     * @return View
     */
    public function show(string $locale, Volunteer $volunteer)
    {
        if ($volunteer === null)
        {
            abort(404);
        }
        else
        {
            return view('volunteer.show', [
                'volunteer' => $volunteer
            ]);
        }
    }


}
