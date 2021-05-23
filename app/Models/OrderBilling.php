<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderBilling extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'amount', 'total_amount', 'paid_amount', 'prepared_by'];
}
