<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillable =
    [
        'title',
        'author',
        'content',
        'featimg',
        'status',
        'published_at',
        'created_by'
    ];

    public function getUser()
    {
        return $this->hasOne(User::class);
    }

    // Get the author that wrote the posts.
    public function blogAuthor()
    {
        return $this->belongsTo('App\User', 'author', 'id');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
