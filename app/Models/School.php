<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class School extends Model
{
    protected $guarded = [];

    public function getAppIconAttribute($value)
    {
        return $value ? Storage::url($value) : null;
    }
}
