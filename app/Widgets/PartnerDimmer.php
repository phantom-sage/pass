<?php

namespace App\Widgets;
use App\Models\Partner;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;

class PartnerDimmer extends BaseDimmer
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
        $count = Partner::all()->count();
        $string = "Partner";

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-activity',
            'title'  => "{$count} {$string}",
            'text'   => __('voyager::dimmer.partner_text', ['count' => $count, 'string' => Str::lower($string)]),
            'button' => [
                'text' =>"view all Partners",
                'link' => route('voyager.partners.index'),
            ],
            'image' => asset('img/03.jpg'),
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
