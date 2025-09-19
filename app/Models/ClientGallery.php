<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientGallery extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'password',
        'cover_image_path',
        'event_date',
    ];

    protected $casts = [
        'password' => 'hashed',
    ];

    public function items()
    {
        return $this->hasMany(GalleryItem::class)->orderBy('order');
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug'; // <-- ESTA ES LA FUNCIÓN AÑADIDA
    }
}