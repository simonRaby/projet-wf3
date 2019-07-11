<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\VilleFrance;

class Partner extends Model
{
    public function collect()
    {
        return $this->hasMany(Collect::class);
    }

    public function villeFrance()
    {
        return $this->belongsTo(VilleFrance::class, 'ville_insee', 'ville_code_commune');
    }

    public function  article()
    {
        return $this->hasMany(Article::class);
    }
}
