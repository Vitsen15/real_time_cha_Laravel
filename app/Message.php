<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    /**
     * Get the user for the blog post.
     */
    public function comments()
    {
        return $this->hasOne('App\User');
    }
}
