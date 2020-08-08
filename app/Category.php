<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable =
    [
        'category',
        'created_by'
    ];

    public function getUser()
    {
        return $this->hasOne(User::class);
    }

    public function getPosts()
    {
        return $this->hasMany('App\Post');
    }
}
