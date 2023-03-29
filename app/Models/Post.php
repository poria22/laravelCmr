<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Models\User;
use App\Models\comment;

class Post extends Model
{
    use HasFactory ,Sluggable;

    protected $fillable=[
        'title',
        'slug',
        'banner',
        'user_id',
        'content'
    ];



    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function  categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function comments()
    {
        return $this->hasMany(\App\Models\comment::class);
    }

    public function jalali()
    {
        return verta($this->created_at)->format('Y/m/d');
    }

    public function getUrlBanner()
    {
        return asset('images/banners/'.$this->banner);
    }
}
