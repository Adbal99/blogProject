<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];

    public function publicImage()
    {
        $imagePath = $this->image ?: 'profile/lGO8BY4OyHAIwuQIPpKZ4dPYo81QykS4EVcieR2F.png';
        return "/storage/".$imagePath;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }




}
