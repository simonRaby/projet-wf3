<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Collect extends Model
{
    public function  partner()
    {
        return $this->belongsTo(Partner::class);
    }

    public function  article()
    {
        return $this->hasMany(Article::class);
    }
}
