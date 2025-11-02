<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'full_name','headline','bio','about_me','avatar_url','location',
        'years_experience','projects_shipped','industries_count','cv_url'
    ];

    public function socialLinks() {
        return $this->hasMany(SocialLink::class);
    }
}
