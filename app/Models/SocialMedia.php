<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'website_url',
        'github_url',
        'twitter_url',
        'instagram_url',
        'facebook_url'
    ];

    public $timestamps = true;
}
