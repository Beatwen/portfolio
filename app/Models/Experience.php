<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Experience extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['name', 'description', 'brief_description'];
    protected $fillable = ['name', 'description', 'project_url', 'github_url', 'brief_description', 'project_id', 'start_date', 'end_date'];
    protected $appends = ['start_year', 'end_year'];
    public function getStartYearAttribute()
    {
        return Carbon::parse($this->start_date)->format('Y');
    }
    public function getEndYearAttribute()
    {
        if ($this->end_date === null) {
            return "Present";
        } else {
            return Carbon::parse($this->end_date)->format('Y');
        }
    }

}
