<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable=[
        'name',
        'link',
        'category_id'
    ];

    public function parent()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class ,'category_id');
    }

    public function parentname()
    {
        return is_null($this->parent)? 'ندارد':$this->parent->name;
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    use HasFactory;
}
