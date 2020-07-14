<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    protected $fillabel = ['name', 'slug'];

    public function posts()
    {
        return $this->BelongsToMany(Post::class);
    }
}
