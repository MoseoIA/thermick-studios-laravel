<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientGallery extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'password', 'cover_image_path', 'event_date'];

    protected $casts = [
        'event_date' => 'date',
    ];

    public function photos()
    {
        return $this->hasMany(GalleryPhoto::class)->orderBy('order');
    }
}