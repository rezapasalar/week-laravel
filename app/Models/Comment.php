<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['locale', 'parent_id', 'product_id', 'body', 'approved', 'read_at'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function isFa(): bool
    {
        return $this->locale === 'fa';
    }

    public function childs()
    {
        return $this->hasMany(Comment::class, "parent_id", "id");
    }

    public function createdAt(): Attribute
    {
        return Attribute::make(get: fn ($value) => \Carbon\Carbon::parse($value)->diffForHumans());
    }
}
