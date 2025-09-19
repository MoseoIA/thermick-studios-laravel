<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryPhoto extends Model
{
    use HasFactory;

    protected $fillable = ['gallery_id', 'image_path', 'order'];

    public function gallery()
    {
        return $this->belongsTo(ClientGallery::class);
    }
}