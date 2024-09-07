<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\Project;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $projects = Project::all();
        $experiences = Experience::all();
        return Inertia::render('Dashboard', [
            'projects' => $projects,
            'experiences' => $experiences
        ]);
    }
}
