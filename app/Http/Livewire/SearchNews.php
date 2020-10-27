<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\News;

class SearchNews extends Component
{
    public $newName;
    public $news;

    public function mount()
    {
        $this->newName = '';
        $this->news = [];
    }


    public function render()
    {
        $this->news = News::where('name_' . app()->getLocale(), 'LIKE', '%'. $this->newName .'%')->get();
        return view('livewire.search-news');
    }
}
