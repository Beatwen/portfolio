<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    # Define the fillable properties
   public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
