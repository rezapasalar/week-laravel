<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Representation extends Model
{
    use HasFactory;

    protected $fillable = ['locale', 'name', 'company_name', 'city', 'phone', 'address', 'description', 'read_at', 'created_at', 'updated_at'];

    public function createdAt(): Attribute
    {
        return Attribute::make(get: fn ($value) => \Carbon\Carbon::parse($value)->diffForHumans());
    }

    public function isFa(): bool
    {
        return $this->locale === 'fa';
    }
}
