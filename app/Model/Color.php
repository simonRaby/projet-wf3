<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    // public function article()
    // {
    //     return $this->belongsToMany(Article::class, 'associations_articles')->withPivot('id', 'quantity', 'created_at', 'updated_at');
    // }
    // public function size()
    // {
    //     return $this->belongsToMany(Size::class, 'associations_articles')->withPivot('id', 'quantity', 'created_at', 'updated_at');
    // }
    public function associationArticle()
    {
        return $this->hasMany(AssociationArticle::class);
    }
}
