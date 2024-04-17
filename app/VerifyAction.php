<?php

namespace App;

use App\Jobs\VerifyJob;
use App\Models\Project;
use App\Models\User;
use App\Notifications\ServiceNotification;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class VerifyAction
{

    public function __construct()
    {
    }

    public function verifyAll()
    {
        $projects = Project::all();
        foreach ($projects as $project) {
            if ($project->status == 1) {
                VerifyJob::dispatch($project)->onQueue('redis');
            }
        }
    }
    public function verify(Project $project)
    {
        $request = Http::get($project->url);
        $status = 0;

        Log::info($request->status());

        if ($request->status() == 200) $status = 1;

        if ($request->status() != 200) {
            $users = User::all();
            foreach ($users as $user) {
                $user->notify(new ServiceNotification($project));
            }
        }

        $project->History()->create([
            'date' => now(),
            'status' => $status,
            'status_code' => $request->status()
        ]);
    }
}
