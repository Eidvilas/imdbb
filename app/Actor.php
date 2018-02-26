<?php

namespace Blog;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    public function user() {
        return $this->belongsTo('Blog\User');
    }
}
