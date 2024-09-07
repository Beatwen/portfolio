<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::create([
            'name' => 'My First Project',
            'description' => 'Detailed description of the project.',
            'brief_description' => 'A brief description of the project.',
            'github_url' => 'https://github.com/example',
            'project_url' => 'https://example.com',
            'start_date' => '2020-01-01',
            'end_date' => '2020-12-31'
        ]);
    }
}
