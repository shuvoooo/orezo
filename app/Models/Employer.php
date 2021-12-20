<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected static function booted()
    {
        static::creating(function ($query) {
            $query->year = $query->year ?? request()->route('year') ?? date('Y');
        });
    }

    public function scopeYear($query)
    {
        return $query->where('year', request()->route('year') ?? date('Y'));
    }
}
