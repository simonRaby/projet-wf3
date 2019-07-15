<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class VilleFrance extends Model
{
    protected $table = 'villes_france_free';
    protected $primaryKey = 'ville_id';

    public function partner()
    {
        return $this->hasMany(Partner::class);
    }
}
