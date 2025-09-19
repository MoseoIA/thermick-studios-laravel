<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioProject extends Model
{
    use HasFactory;

    protected $fillable = ['portfolio_category_id', 'title', 'slug', 'description', 'cover_image_path'];

    public function category()
    {
        return $this->belongsTo(PortfolioCategory::class, 'portfolio_category_id');
    }

    public function images()
    {
        return $this->hasMany(ProjectImage::class);
    }
}