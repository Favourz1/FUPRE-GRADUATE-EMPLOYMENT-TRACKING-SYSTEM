<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class JobProfile extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $guarded = [];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('job_profiles');
    }

    public function getHasMediaAttribute(): bool
    {
        return $this->hasMedia('job_profiles');
    }

    public function getEmploymentLetterUrlAttribute(): string
    {
        return $this->has_media ? $this->getFirstMediaUrl('job_profiles') : '';
    }
}
