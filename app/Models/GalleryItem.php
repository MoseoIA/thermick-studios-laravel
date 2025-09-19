<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Storage;

class GalleryItem extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'client_gallery_id',
        'type',
        'path_or_url',
        'order',
    ];

    /**
     * Get the gallery that this item belongs to.
     */
    public function gallery()
    {
        return $this->belongsTo(ClientGallery::class, 'client_gallery_id');
    }

    /**
     * Get the full URL for photo items.
     */
    protected function photoUrl(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->type === 'photo' ? Storage::url($this->path_or_url) : null
        );
    }

    /**
     * Get the embed URL for video items.
     */
    protected function embedUrl(): Attribute
    {
        return Attribute::make(
            get: function () {
                if ($this->type !== 'video' || empty($this->path_or_url)) {
                    return null;
                }

                // Extracts the ID from URLs like .../d/VIDEO_ID/view...
                preg_match('/\/d\/(.*?)(?:\/|\?|$)/', $this->path_or_url, $matches);

                if (isset($matches[1])) {
                    $videoId = $matches[1];
                    return 'https://drive.google.com/file/d/' . $videoId . '/preview';
                }

                return null; // Return null if the URL format is not recognized
            },
        );
    }
}