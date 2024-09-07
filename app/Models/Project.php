<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'project_url', 'github_url', 'brief_description', 'project_id', 'start_date', 'end_date'];

    use HasTranslations;
    public $translatable = ['name', 'description', 'brief_description'];

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
