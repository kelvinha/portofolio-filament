<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class WorkExperience extends Model
{
    protected $fillable = [
        'company_name',
        'company_logo',
        'description',
        'roles',
        'work_start_year',
        'work_end_year'
    ];

    protected $casts = [
        'work_start_year' => 'integer',
        'work_end_year' => 'integer',
    ];

    public function getCompanyLogoUrlAttribute()
    {
        return $this->company_logo ? Storage::disk('public')->url($this->company_logo) : null;
    }
}
