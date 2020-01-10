<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class status extends Model
{
    protected $table = 'Status';

    public function  collect()
    {
        return $this->hasMany(Partner::class);
    }
}
