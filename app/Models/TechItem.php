<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TechItem extends Model
{
    protected $fillable = ['tech_group_id','name','icon_url','is_featured','sort_order'];

    public function group(){ 
        return $this->belongsTo(TechGroup::class,'tech_group_id');
    }

    public function projects(){ 
        return $this->belongsToMany(Project::class,'project_tech_item');
    }
}