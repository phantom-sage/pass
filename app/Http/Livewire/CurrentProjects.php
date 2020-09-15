<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CurrentProjects extends Component
{
    public $project;

    public function mount($project)
    {
        $this->project = $project;
    }

    public function render()
    {
        return view('livewire.current-projects');
    }
}
