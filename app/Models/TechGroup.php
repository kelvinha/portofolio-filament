<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TechGroup extends Model
{
    protected $fillable = ['name','slug','sort_order'];

    public function items(){ 
        return $this->hasMany(TechItem::class);
    }
}
