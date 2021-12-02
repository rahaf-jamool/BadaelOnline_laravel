<?php

namespace App\Models\Languages;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;
    protected $fillable = [
        'abbr','locale','name','direction','active'
    ];
}
