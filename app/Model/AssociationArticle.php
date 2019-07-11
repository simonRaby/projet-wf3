<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Relations\Pivot;

class AssociationArticle extends Pivot
{
    protected $table = 'associations_articles';
}
