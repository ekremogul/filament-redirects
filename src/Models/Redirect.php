<?php

namespace Ekremogul\FilamentRedirects\Models;

use Illuminate\Database\Eloquent\Model;

class Redirect extends Model
{
    protected $fillable = [
        'source',
        'destination',
        'status_code',
        'enabled',
    ];

    protected $casts = [
        'enabled' => 'boolean',
    ];
}
