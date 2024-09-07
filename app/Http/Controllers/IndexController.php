<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;
use App\Models\Project;
use App\Models\Experience;

class IndexController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('start_date', 'desc')->get();
        $experiences = Experience::orderBy('start_date', 'desc')->get();
        $locale = App::getLocale();
        $messages = __('messages');
        return Inertia::render('Index', [
            'projects' => $projects,
            'experiences' => $experiences,
            'locale' => $locale,
            'messages' => $messages
        ]);
    }
}
