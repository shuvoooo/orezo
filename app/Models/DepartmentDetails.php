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

    public function department()
    {
        return $this->belongsTo(User::class);
    }
}
