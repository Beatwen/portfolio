<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ExperienceController extends Controller
{
    public function create()
    {
        return Inertia::render('Experiences/Create');
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
            'experience_url' => 'nullable|url',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
        ]);

        $experience = new Experience();
        $experience->setTranslation('name', 'en', $validated['name_en']);
        if (!empty($validated['name_fr'])) {
            $experience->setTranslation('name', 'fr', $validated['name_fr']);
        }

        $experience->setTranslation('brief_description', 'en', $validated['brief_description_en']);
        if (!empty($validated['brief_description_fr'])) {
            $experience->setTranslation('brief_description', 'fr', $validated['brief_description_fr']);
        }

        $experience->setTranslation('description', 'en', $validated['description_en']);
        if (!empty($validated['description_fr'])) {
            $experience->setTranslation('description', 'fr', $validated['description_fr']);
        }

        $experience->experience_url = $validated['experience_url'];
        $experience->start_date = $validated['start_date'];
        $experience->end_date = $validated['end_date'];
        $experience->save();

        return redirect()->route('dashboard');
    }

    public function edit(Experience $experience)
    {
        return Inertia::render('Experiences/Edit', [
            'experience' => [
                'id' => $experience->id,
                'name_en' => $experience->getTranslation('name', 'en'),
                'name_fr' => $experience->getTranslation('name', 'fr'),
                'brief_description_en' => $experience->getTranslation('brief_description', 'en'),
                'brief_description_fr' => $experience->getTranslation('brief_description', 'fr'),
                'description_en' => $experience->getTranslation('description', 'en'),
                'description_fr' => $experience->getTranslation('description', 'fr'),
                'experience_url' => $experience->experience_url,
                'start_date' => $experience->start_date,
                'end_date' => $experience->end_date,
            ],
        ]);
    }

    public function update(Experience $experience)
    {
        $validated = request()->validate([
            'name_en' => 'required|string|max:255',
            'name_fr' => 'nullable|string|max:255',
            'brief_description_en' => 'required|string',
            'brief_description_fr' => 'nullable|string',
            'description_en' => 'required|string',
            'description_fr' => 'nullable|string',
            'experience_url' => 'nullable|url',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
        ]);

        $experience->setTranslation('name', 'en', $validated['name_en']);
        if (!empty($validated['name_fr'])) {
            $experience->setTranslation('name', 'fr', $validated['name_fr']);
        }

        $experience->setTranslation('brief_description', 'en', $validated['brief_description_en']);
        if (!empty($validated['brief_description_fr'])) {
            $experience->setTranslation('brief_description', 'fr', $validated['brief_description_fr']);
        }

        $experience->setTranslation('description', 'en', $validated['description_en']);
        if (!empty($validated['description_fr'])) {
            $experience->setTranslation('description', 'fr', $validated['description_fr']);
        }

        $experience->experience_url = $validated['experience_url'];
        $experience->start_date = $validated['start_date'];
        $experience->end_date = $validated['end_date'];
        $experience->save();

        return redirect()->route('dashboard');
    }

    public function destroy(Experience $experience)
    {
        $experience->delete();
        return redirect()->route('dashboard');
    }
}
