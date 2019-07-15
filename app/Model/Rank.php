<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    public function  article()
    {
        return $this->hasMany(Article::class);
    }
}
