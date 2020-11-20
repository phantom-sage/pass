<?php

namespace App\Widgets;
use App\Models\Vistor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;

class VistorsDimmer extends BaseDimmer
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
        $count = Vistor::where('date','=',date('Y-m-d'))->count();
        $string =trans_choice('voyager::dimmer.vistor', $count);

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-person',
            'title'  => "{$count} {$string}",
            'text'   => __('voyager::dimmer.vistor_text', ['count' => $count, 'string' => Str::lower($string)]),
            'button' => [
                'text' =>__('voyager::dimmer.vistors_link_text'),
                'link' => route('voyager.vistors'),
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
