<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;


    protected $guarded = [];

    public static $tax_percent = 18;
    public static $tax_text = 'Tax';

    public function scopeByUserId($query, $user_id)
    {
        return $query->where('user_id', $user_id);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function addedBy()
    {
        return $this->belongsTo(User::class, 'added_by');
    }

    public function scopeGetTotal($query, $invoice_id, $totalOnly = true)
    {
        $total = 0;
        $tax = 0;
        $discount = 0;
        $sub_total = 0;
        $invoiceitem = InvoiceItem::byInvoiceId($invoice_id)->get();

        $sum_items = [];
        $discount_items = [];
        if (!empty($invoiceitem)) {
            foreach ($invoiceitem as $item) {
                if ($item->title != self::$tax_text) {
                    if ($item->title == 'Discount' || $item->title == 'discount') {
                        //$total = $total - $item->price;
                        $discount_items[] = $item->price;
                    } else {
                        //$total = $total + $item->price;
                        $sum_items[] = $item->price;
                    }
                }
            }
        }

        $total = array_sum($sum_items);
        $discount = array_sum($discount_items);
        $tax = ($total * self::$tax_percent) / 100;
        $sub_total = $total + $tax - $discount;

        if ($totalOnly) {
            return $sub_total;
        } else {
            return ['total' => $total, 'tax' => $tax, 'discount' => $discount, 'sub_total' => $sub_total];
        }

    }
}
