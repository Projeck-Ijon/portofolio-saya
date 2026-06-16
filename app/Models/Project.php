<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['title', 'description', 'tags', 'image_base64', 'github_url', 'demo_url'];
}
