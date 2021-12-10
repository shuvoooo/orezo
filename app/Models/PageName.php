<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageName extends Model
{
    protected $guarded = [];

    public function Pagecontent(){
        return $this->hasMany(PageContent::class);
    }
}
