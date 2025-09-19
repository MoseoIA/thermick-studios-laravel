<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientGallery extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'slug',
        'password',
        'cover_image_path',
        'event_date',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
    ];

    /**
     * Get the items for the gallery, ordered correctly.
     */
    public function items()
    {
        return $this->hasMany(GalleryItem::class)->orderBy('order');
    }

    /**
     * Get the route key for the model.
     * This tells Laravel to use the 'slug' column in URLs instead of the 'id'.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}