<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = [
        'logo',
        'desc',
        'address',
        'email',
        'phone',
        'vat',
        'shipping',
        'fac_url',
        'whats_url',
        'youtube_url',
        'ln_url',
        'tw_url',
    ];
}
