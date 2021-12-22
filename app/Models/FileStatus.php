<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileStatus extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected static function booted()
    {
        static::creating(function ($query) {
            $query->year = $query->year ?? request()->route('year') ?? date('Y');
        });
    }

    public function statusList(): array
    {
        return [
            1 => 'Information Pending',
            2 => 'Under Preparation',
            3 => 'Payment Pending',
            4 => 'E-Filing Pending',
            5 => 'Completed'
        ];
    }

    public function added_by()
    {
        return $this->belongsTo(User::class, 'added_by');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeYear($query)
    {
        return $query->where('year', request()->route('year') ?? date('Y'));
    }
}
