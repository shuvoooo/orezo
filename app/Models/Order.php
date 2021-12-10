<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;


    protected $fillable = [
        'cpa_id',
        'email',
        'cost',
        'status',
        'payment_status',
        'phone_time',
        'phone_text',
        'invoice_id',
    ];
}
