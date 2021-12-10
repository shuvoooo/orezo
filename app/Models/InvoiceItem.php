<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeByInvoiceId($query, $invoice_id)
    {
        return $query->where('invoice_id', $invoice_id);
    }


}
