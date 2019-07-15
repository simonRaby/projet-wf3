<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Marque extends Model
{
    public function  article()
    {
        return $this->hasMany(Article::class);
    }
}
