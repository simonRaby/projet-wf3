<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function  collect()
    {
        return $this->belongsTo(Collect::class);
    }

    public function size()
    {
        return $this->belongsToMany(Size::class)->using(AssociationArticle::class)->withPivot('quantity', 'created_at', 'updated_at');
    }

    public function color()
    {
        return $this->belongsToMany(Color::class, 'associations_articles')->withPivot('quantity', 'created_at', 'updated_at');
    }
}
