<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = ['logo', 'footer_description', 'email', 'phone_number1', 'phone_number2', 'address', 'linkedin_url', 'twitter_url', 'instagram_url', 'youtube_url', 'banner'];
}
