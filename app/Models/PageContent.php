<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageContent extends Model
{
    use HasFactory;

    protected $guarded = [];

    public  function pageName(){

        return $this->belongsTo(PageName::class);
    }
}
