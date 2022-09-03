<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPUnit\Framework\isNull;

class Employment extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'code',
        'year',
        'gender',
        'marital_status',
        'father_job',
        'military_status',
        'education',
        'field',
        'willingness_work',
        'name_guarantor',
        'work_experience',
        'work_experience_description',
        'mobile',
        'phone',
        'address',
        'photo_path',
        'read_at',
        'created_at',
        'updated_at'
    ];

    public function createdAt(): Attribute
    {
        return Attribute::make(get: fn ($value) => \Carbon\Carbon::parse($value)->diffForHumans());
    }

    public function gender(): Attribute
    {
        return Attribute::make(get: fn ($value) => $value ? 'مرد' : 'زن');
    }

    public function maritalStatus(): Attribute
    {
        return Attribute::make(get: fn ($value) => $value ? 'مجرد' : 'متاهل');
    }
}
