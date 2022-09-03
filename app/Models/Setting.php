<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = ['app_name_fa', 'app_name_en', 'dollar', 'allow_comment', 'allow_email'];
}
