<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Category extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = ['name_en', 'name_fa', 'slug'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name_en'
            ]
        ];
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function nameEn(): Attribute
    {
        return Attribute::make(set: fn ($value) => $this->attributes['name_en'] = ucwords($value));
    }
}
