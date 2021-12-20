<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartmentDetails extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'date_of_birth' => 'date',
    ];

    protected static function booted()
    {
        static::creating(function ($query) {
            $query->year = $query->year ?? request()->route('year') ?? date('Y');
        });
    }

    public function department()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeYear($query)
    {
        return $query->where('year', request()->route('year') ?? date('Y'));
    }
}
