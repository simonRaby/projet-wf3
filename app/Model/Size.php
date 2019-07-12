<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    // public function article()
    // {
    //     return $this->belongsToMany(Article::class, 'associations_articles')->withPivot('id', 'quantity', 'created_at', 'updated_at');
    // }

    // public function color()
    // {
    //     return $this->belongsToMany(Color::class, 'associations_articles')->withPivot('id', 'quantity', 'created_at', 'updated_at');
    // }
    public function associationArticle()
    {
        return $this->hasMany(AssociationArticle::class);
    }
}
