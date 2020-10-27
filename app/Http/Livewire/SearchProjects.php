<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Project;

class SearchProjects extends Component
{
    public $projectName;
    public $projects;

    public function mount()
    {
        $this->projectName = '';
        $this->projects = [];
    }

    public function render()
    {
        $this->projects = Project::where('name_' . app()->getLocale(), 'LIKE', '%'. $this->projectName .'%')->get();
        return view('livewire.search-projects');
    }
}
