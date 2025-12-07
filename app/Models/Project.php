<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'project_category_id','title','year','role','hero_image_url','description_html',
        'live_url','repo_url','is_featured'
    ];

    public function category(){
        return $this->belongsTo(ProjectCategory::class, "project_category_id");
    }

    public function techItems(){
        return $this->belongsToMany(TechItem::class,'project_tech_item');
    }
}
