<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kalnoy\Nestedset\NodeTrait;

class ShopCategory extends Model
{
    use HasFactory, SoftDeletes;


    protected $guarded = [];

    public function parent()
    {
        return $this->belongsTo(ShopCategory::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(ShopCategory::class, 'parent_id');
    }
}
