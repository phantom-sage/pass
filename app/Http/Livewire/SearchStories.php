<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Story;

class SearchStories extends Component
{
    public $storyName;
    public $stories;

    public function mount()
    {
        $this->storyName = '';
        $this->stories = [];
    }


    public function render()
    {
        $this->stories = Story::where('story_' . app()->getLocale(), 'LIKE', '%'. $this->storyName .'%')->get();
        return view('livewire.search-stories');
    }
}
