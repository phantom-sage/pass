<?php

namespace App\Widgets;
use App\Models\Story;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;

class StoryDimmer extends BaseDimmer
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
        $count = Story::all()->count();
        $string = "Story";

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-bookmark',
            'title'  => "{$count} {$string}",
            'text'   => __('voyager::dimmer.story_text', ['count' => $count, 'string' => Str::lower($string)]),
            'button' => [
                'text' =>"view all Stories",
                'link' => route('voyager.stories.index'),
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
