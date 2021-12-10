<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
    protected $guarded = ['id'];

    protected $fillable = ['user_id','details'];

    public $timestamps = false;

    public function scopeGetByUser($query, $user_id)
    {
        $permission = RolePermission::where('user_id',$user_id)->first();
        if(empty($permission))
            return [];
        else{
            return empty($permission->details) ? [] : json_decode($permission->details);
        }
    }
}
