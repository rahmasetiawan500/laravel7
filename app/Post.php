<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    protected $fillable = ['title' , 'slug' , 'body', 'category_id', 'thumbnail'];
    // protected $guarded = [];
    protected $with = ['user', 'category', 'tags'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getTakeImageAttribute()
    {
        return "/storage/".$this->thumbnail;
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}


