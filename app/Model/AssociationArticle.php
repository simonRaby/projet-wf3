<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AssociationArticle extends Model
{
    protected $table = 'associations_articles';

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
    public function size()
    {
        return $this->belongsTo(Size::class);
    }
    public function color()
    {
        return $this->belongsTo(Color::class);
    }
}
