<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProjectController extends Controller
{
    public function create()
    {
        return Inertia::render('Projects/Create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name_en' => 'required|string|max:255',
            'name_fr' => 'nullable|string|max:255',
            'brief_description_en' => 'required|string',
            'brief_description_fr' => 'nullable|string',
            'description_en' => 'required|string',
            'description_fr' => 'nullable|string',
            'github_url' => 'nullable|url',
            'project_url' => 'nullable|url',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $project = new Project();
        $project->setTranslation('name', 'en', $validated['name_en']);
        if (!empty($validated['name_fr'])) {
            $project->setTranslation('name', 'fr', $validated['name_fr']);
        }

        $project->setTranslation('brief_description', 'en', $validated['brief_description_en']);
        if (!empty($validated['brief_description_fr'])) {
            $project->setTranslation('brief_description', 'fr', $validated['brief_description_fr']);
        }

        $project->setTranslation('description', 'en', $validated['description_en']);
        if (!empty($validated['description_fr'])) {
            $project->setTranslation('description', 'fr', $validated['description_fr']);
        }
        $project->github_url = $validated['github_url'];
        $project->project_url = $validated['project_url'];
        $project->start_date = $validated['start_date'];
        $project->end_date = $validated['end_date'];


        if ($file = $request->file('image')) {
            $filename = $file->getClientOriginalName();
            $destinationPath = public_path('storage/images/projects');
            $file->move($destinationPath, $filename);
            $project->image = 'images/projects/' . $filename;
        }
        $project->save();

        return redirect()->route('dashboard');
    }
    public function edit(Project $project)
    {
        return Inertia::render('Projects/Edit', [
            'project' => [
                'id' => $project->id,
                'name_en' => $project->getTranslation('name', 'en'),
                'name_fr' => $project->getTranslation('name', 'fr'),
                'brief_description_en' => $project->getTranslation('brief_description', 'en'),
                'brief_description_fr' => $project->getTranslation('brief_description', 'fr'),
                'description_en' => $project->getTranslation('description', 'en'),
                'description_fr' => $project->getTranslation('description', 'fr'),
                'github_url' => $project->github_url,
                'project_url' => $project->project_url,
                'start_date' => $project->start_date,
                'end_date' => $project->end_date,
                'image' => $project->image,
            ],
        ]);
    }


    public function update(Project $project)
    {
        $validated = request()->validate([
            'name_en' => 'required|string',
            'name_fr' => 'nullable|string',
            'description_en' => 'required|string',
            'description_fr' => 'nullable|string',
            'brief_description_en' => 'required|string',
            'brief_description_fr' => 'nullable|string',
            'github_url' => 'nullable|url',
            'project_url' => 'nullable|url',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
        ]);

        $project->setTranslation('name', 'en', $validated['name_en']);
        if (!empty($validated['name_fr'])) {
            $project->setTranslation('name', 'fr', $validated['name_fr']);
        }

        $project->setTranslation('brief_description', 'en', $validated['brief_description_en']);
        if (!empty($validated['brief_description_fr'])) {
            $project->setTranslation('brief_description', 'fr', $validated['brief_description_fr']);
        }

        $project->setTranslation('description', 'en', $validated['description_en']);
        if (!empty($validated['description_fr'])) {
            $project->setTranslation('description', 'fr', $validated['description_fr']);
        }

        $project->github_url = $validated['github_url'];
        $project->project_url = $validated['project_url'];
        $project->start_date = $validated['start_date'];
        $project->end_date = $validated['end_date'];

        $project->save();

        return redirect()->route('dashboard');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('dashboard');
    }
}
