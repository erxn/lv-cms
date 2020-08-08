<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    protected $table = 'posts';
    protected $fillable =
    [
        'title',
        'author',
        'content',
        'status',
        'published_at',
        'created_by'
    ];

    public function getUser()
    {
        return $this->hasOne(User::class);
    }

    public function getData(string $name)
    {
        return Arr::get($this->data, $name);
    }
}
