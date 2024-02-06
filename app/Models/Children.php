<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Children extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'story',
        'hobby',
        'profile_picture',
        'gender',
        'is_sponsored',
        'date_of_birth'
    ];

    protected $casts = [
        'story' => 'array',
        'hobby' => 'array',
    ];

    protected $hidden = [
        "created_at",
        "updated_at",
        "deleted_at",
        "gender"
    ];
    //fountainofpeaceo_donations

    public function mother()
    {
        return $this->belongsTo(Mother::class);
    }

    public function sponsorChild()
    {
        return $this->hasMany(SponsorChild::class);
    }

    public function sponsors()
    {
        return $this->belongsToMany(Sponsor::class, 'sponsor_children');
    }

    // Accessor to retrieve the full profile picture URL
    public function getProfilePictureAttribute()
    {
        $profilePicturePath = $this->attributes['profile_picture'];

        // Generate the full URL using the asset function
        return $profilePicturePath ? asset("storage/{$profilePicturePath}") : null;
    }

    
}
