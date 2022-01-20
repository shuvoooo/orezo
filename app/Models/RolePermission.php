<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
    protected $fillable = ['user_id', 'details'];

    protected $casts = [
        'details' => 'json',
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }




//    public function scopeGetByUser($query, $user_id)
//    {
//        $permission = RolePermission::where('user_id', $user_id)->first();
//
//        if (empty($permission))
//            return [];
//        else {
//            return empty($permission->details) ? [] : json_decode($permission->details);
//        }
//    }
}
