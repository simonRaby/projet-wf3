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
        return $this->belongsToMany(Size::class, 'associations_articles')->withPivot('quantity', 'created_at', 'updated_at');
    }

    public function color()
    {
        return $this->belongsToMany(Color::class, 'associations_articles')->withPivot('quantity', 'created_at', 'updated_at');
    }

    public function  rank()
    {
        return $this->belongsTo(Rank::class);
    }

    public function  category()
    {
        return $this->belongsTo(Category::class);
    }
    public function  gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function  Partner()
    {
        return $this->belongsTo(Partner::class);
    }
}
