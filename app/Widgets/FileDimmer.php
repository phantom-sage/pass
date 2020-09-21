<?php

namespace App\Widgets;
use App\Models\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;

class FileDimmer extends BaseDimmer
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
        $count = File::all()->count();
        $string = trans_choice('voyager::dimmer.file', $count);


        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-file-text',
            'title'  => "{$count} {$string}",
            'text'   => __('voyager::dimmer.file_text', ['count' => $count, 'string' => Str::lower($string)]),
            'button' => [
                'text' =>__('voyager::dimmer.file_link_text'),
                'link' => route('voyager.files.index'),
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
