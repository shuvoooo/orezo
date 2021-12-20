<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalInformation extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected static function booted()
    {
        static::creating(function ($query) {
            $query->year = $query->year ?? request()->route('year') ?? date('Y');
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeYear($query)
    {
        return $query->where('year', request()->route('year') ?? date('Y'));
    }
}
