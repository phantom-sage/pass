<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\File;

class SearchReports extends Component
{
    public $fileName;
    public $files;

    public function mount()
    {
        $this->fileName = '';
        $this->files = [];
    }

    public function render()
    {
        $this->files = File::where('name_' . app()->getLocale(), 'LIKE', '%'. $this->fileName .'%')->get();
        return view('livewire.search-reports');
    }
}
