<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = ['locale', 'parent_id', 'name', 'email', 'subject', 'body', 'read_at'];

    public function createdAt(): Attribute
    {
        return Attribute::make(get: fn ($value) => \Carbon\Carbon::parse($value)->diffForHumans());
    }

    public function isFa(): bool
    {
        return $this->locale === 'fa';
    }
}
