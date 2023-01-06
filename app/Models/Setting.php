<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $table = 'settings';

    protected $fillable = [
        'name_website',
        'url_website',
        'page_title',
        'keywords',
        'about',
        'description_website',
        'phone_website',
        'email_website',
        'wa_website',
        'address_website',
        'fb_website',
        'ig_website',
        'youtube_website',
        'twitter_website'
    ];
}