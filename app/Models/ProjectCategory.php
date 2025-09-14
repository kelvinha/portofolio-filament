<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectCategory extends Model
{
    protected $fillable = ['name','slug','sort_order'];

    public function projects(){ 
        return $this->hasMany(Project::class);
    }
}
