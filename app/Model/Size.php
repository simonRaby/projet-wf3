<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    public function article()
    {
        return $this->belongsToMany(Article::class)->using(AssociationArticle::class)->withPivot('quantity', 'created_at', 'updated_at');
    }
}
