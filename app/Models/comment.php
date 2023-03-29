<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;

    protected $fillable=[
      'content',
      'approved',
      'user_id',
      'post_id',
      'comment_id'
    ];
    protected $with=['replies'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function replies()
    {
        return $this->hasMany(comment::class ,'comment_id');
    }

    public function jalali()
    {
        return verta($this->created_at)->format('Y/m/d');
    }
    public function approvedfarsi()
    {
        return ($this->approved==0)?'تایید نشده':'تایید شده';
    }

}
