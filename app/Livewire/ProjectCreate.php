<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ProjectCreate extends Component
{

    #[Validate('required|min:3|url')]
    public string $url;

    public string $api_url = "";

    #[Validate('required')]
    public int    $status;

    #[Validate('required|min:3')]
    public string $name;

    public function store()
    {
        $this->validate();

        $project = new Project();

        $project->url = $this->url;
        $project->api_url = $this->api_url;
        $project->status = $this->status;
        $project->name = $this->name;
        $project->save();

        return redirect()->route('home');
    }

    public function render()
    {
        return view('livewire.project-create')->layout('layouts.app');
    }
}
