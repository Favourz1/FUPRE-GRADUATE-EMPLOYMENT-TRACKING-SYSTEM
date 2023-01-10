<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Student extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $guarded = [];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('students');
    }

    public function getHasMediaAttribute(): bool
    {
        return $this->hasMedia('students');
    }

    public function getUrlAttribute(): string
    {
        return $this->has_media ? $this->getFirstMediaUrl('students') : '';
    }

    public function getNameAttribute() {
        $middleName = $this->other_name ?
            strtoupper(substr($this->other_name, 0, 1)) . "." : " ";
        return $this->first_name . " {$middleName} " . $this->last_name;
    }

    public function getFullNameAttribute() {
        return $this->first_name . " {$this->other_name} " . $this->last_name;;
    }
}
