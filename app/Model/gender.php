<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    public function  article()
    {
        return $this->hasMany(Article::class);
    }
}
