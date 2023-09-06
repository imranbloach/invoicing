<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'invoice_number', 'discount', 'tax', 'total_amount', 'status', 'due_date'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    // Additional methods as needed.

}
