<?php

namespace App\Livewire;

use App\Models\Project;
use App\VerifyAction;
use Illuminate\Support\Facades\Artisan;
use Livewire\Component;

class ProjectsList extends Component
{

    public function verificar()
    {
        $action = new VerifyAction();
        $action->verifyAll();
    }

    public function render()
    {
        $projects = Project::with('History')->get();

        return view('livewire.projects-list', [
            'projects' => $projects
        ]);
    }
}
