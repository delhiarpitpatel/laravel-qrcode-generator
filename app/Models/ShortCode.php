<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShortCode extends Model
{
    protected $fillable = [
        'code',
        'data',
        'visit_count',
    ];
}
