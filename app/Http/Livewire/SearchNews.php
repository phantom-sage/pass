<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\News;

class SearchNews extends Component
{
    use WithPagination;

    public $newName;
    public $news;

    public function searchingNews()
    {
        $this->news = News::where('name_' . app()->getLocale(), 'LIKE', '%'. $this->newName .'%')->get();
    }

    public function mount()
    {
        $this->newName = '';
        $this->news = News::all();
    }

    public function render()
    {
        return view('livewire.search-news');
    }

}
