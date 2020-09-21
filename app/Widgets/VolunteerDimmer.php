<?php

namespace App\Widgets;
use App\Models\Volunteer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;

class VolunteerDimmer extends BaseDimmer
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $count = Volunteer::all()->count();
        $string = trans_choice('voyager::dimmer.volunteer', $count);

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-bulb',
            'title'  => "{$count} {$string}",
            'text'   => __('voyager::dimmer.volunteer_text', ['count' => $count, 'string' => Str::lower($string)]),
            'button' => [
                'text' =>__('voyager::dimmer.volunteer_link_text'),
                'link' => route('voyager.volunteers.index'),
            ],
            'image' => asset('img/01.jpg'),
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return Auth::user()->can('browse', Voyager::model('User'));
    }
}
