<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileStatus extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function statusList()
    {
        return [
            1=>'Information Pending',
            2=>'Under Preparation',
            3=>'Payment Pending',
            4=>'E-Filing Pending',
            5=>'Completed'
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'added_by');
    }

    public function statusTo()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
