<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactSubmission extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'event_type', 'message'];

    protected $casts = [
        'created_at' => 'datetime',
    ];
}